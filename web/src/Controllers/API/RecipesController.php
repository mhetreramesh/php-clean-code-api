<?php declare(strict_types = 1);

namespace RestApi\Controllers\API;

use Http\Request;
use Http\Response;
use PDO;
use RedBeanPHP\R as R;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Core\Factory\GuestFactory;
use RestApi\Transformers\RecipeTransformer;

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
        $resource = new Collection($recipes, new RecipeTransformer);
        
        $data = $this->fractal->createData($resource)->toJson();
        $this->response->setContent($data);
    }

    public function show($data)
    {
        $recipe = GuestFactory::getRecipe()->execute($data['id']);
        if(empty($recipe)) {
            $this->response->setStatusCode(404, 'Requested recipe not found');
            return;
        }
        $resource = new Item($recipe, new RecipeTransformer);
        
        $data = $this->fractal->createData($resource)->toJson();
        $this->response->setContent($data);
    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function delete()
    {
        
    }
}