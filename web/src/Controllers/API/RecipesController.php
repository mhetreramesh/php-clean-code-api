<?php declare(strict_types = 1);

namespace RestApi\Controllers\API;

use Http\Request;
use Http\Response;
use PDO;
use RedBeanPHP\R as R;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Core\Factory\GuestFactory;

class RecipesController extends BaseApiController
{
    public function __construct(Request $request, Response $response)
    {
        parent::__construct($request, $response);
    }

    public function index()
    {
        $recipes = GuestFactory::getRecipes()->execute();
        //var_dump($recipes); die;
            /*
        try{
            R::setup("pgsql:dbname=hellofresh;host=postgres", "hellofresh", "hellofresh");
            
            $recipe = R::dispense('recipes');
            $recipe->name = 'Jaeger';
            $recipe->prep_time = '3 Hours';
            $recipe->difficulty = 3;
            $recipe->vegetarian = 0;
            $id = R::store( $recipe );

            $new = R::load('recipes', 2);
            $new->name = 'Ramesh Jaeger new';
            $id = R::store( $new );
            print_r($id);
            $new = R::findAll('recipes');

            print_r($new[2]->name);
            die;
        } catch(Throwable $e) {
            $trace = $e->getTrace();
            echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
        }
*/
        $resource = new Collection($recipes, function($recipes) {
            return [
                'id'      => (int) $recipes->id,
                'name'   => $recipes->name,
                'prep_time' => $recipes->prep_time,
                'difficulty' => (int) $recipes->difficulty,
                'vegetarian' => (bool) $recipes->vegetarian,
                'ratings'  => [],
                'links'   => [
                    [
                        'rel' => 'self',
                        'uri' => '/recipes/'.$recipes['id'],
                    ]
                ]
            ];
        });
        
        $data = $this->fractal->createData($resource)->toJson();
        $this->response->setContent($data);
    }

    public function show($data)
    {
        $recipe = GuestFactory::getRecipe()->execute($data['id']);
        $resource = new Item($recipe, function($recipe) {
            return [
                'id'      => (int) $recipe->id,
                'name'   => $recipe->name,
                'prep_time' => $recipe->prep_time,
                'difficulty' => (int) $recipe->difficulty,
                'vegetarian' => (bool) $recipe->vegetarian,
                'ratings'  => [],
                'links'   => [
                    [
                        'rel' => 'self',
                        'uri' => '/recipes/'.$recipe['id'],
                    ]
                ]
            ];
        });
        
        $data = $this->fractal->createData($resource)->toJson();
        $this->response->setContent($data);
    }
}