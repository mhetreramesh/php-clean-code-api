<?php declare(strict_types = 1);

namespace RestApi\Controllers\API;

use Http\Response;
use PDO;
use RedBeanPHP\R as R;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Core\Factory\GuestFactory;
use Core\Factory\UserFactory;
use RestApi\Transformers\RecipeTransformer;

class RecipesController extends BaseApiController
{
    public function __construct(Response $response)
    {
        parent::__construct($response);
    }

    public function index()
    {
        $query = $this->request->getParameter('search', NULL);
        $orderBy = $this->request->getParameter('orderBy', NULL);
        $orderDirection = $this->request->getParameter('orderDirection', 'DESC');
        $limit = $this->request->getParameter('limit', 5);
        $offset = $this->request->getParameter('offset', 0);

        $recipes = GuestFactory::getRecipes()->execute($query, $orderBy, $orderDirection, $limit, $offset);
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
        $data = [
            'name' => $this->request->getParameter('name', 'Test Recipe'),
            'prep_time' => $this->request->getParameter('prep_time', '1 Hour'),
            'difficulty' => $this->request->getParameter('difficulty', 1),
            'vegetarian' => $this->request->getParameter('vegetarian', 0)
        ];
        $recipe = UserFactory::createRecipe()->execute($data);

        $resource = new Item($recipe, new RecipeTransformer);
        $data = $this->fractal->createData($resource)->toJson();
        $this->response->setContent($data);
    }

    public function update($input)
    {
        $data = [
            'name' => $this->request->getParameter('name'),
            'prep_time' => $this->request->getParameter('prep_time'),
            'difficulty' => $this->request->getParameter('difficulty'),
            'vegetarian' => $this->request->getParameter('vegetarian')
        ];
        $recipe = UserFactory::updateRecipe()->execute($input['id'], $data);

        $resource = new Item($recipe, new RecipeTransformer);
        $data = $this->fractal->createData($resource)->toJson();
        $this->response->setContent($data);
    }

    public function delete()
    {
        UserFactory::deleteRecipe()->execute($data);
        $data = [];
        $this->response->setContent($data);
    }
}