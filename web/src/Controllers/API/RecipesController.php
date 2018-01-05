<?php declare(strict_types = 1);

namespace RestApi\Controllers\API;

use Http\Request;
use Http\Response;
use League\Fractal\Resource\Collection;

class RecipesController extends BaseApiController
{
    public function __construct(Request $request, Response $response)
    {
        parent::__construct($request, $response);
    }

    public function index()
    {
        $recipes = [
            [
                'id' => '1',
                'name' => 'Jaeger Schnitzel',
                'prep_time' => '3 Hours',
                'difficulty' => 3,
                'vegetarian' => 0,
            ],
            [
                'id' => '2',
                'name' => 'Bee Sting Cake',
                'prep_time' => '45 Mins',
                'difficulty' => 1,
                'vegetarian' => 1,
            ]
        ];

        $resource = new Collection($recipes, function(array $recipes) {
            return [
                'id'      => (int) $recipes['id'],
                'name'   => $recipes['name'],
                'prep_time' => $recipes['prep_time'],
                'difficulty' => (int) $recipes['difficulty'],
                'vegetarian' => (bool) $recipes['vegetarian'],
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
        $response = $this->response->getContent();
        //print_r($response);
    }

    public function show()
    {
        $content = '<h1>Hello World</h1>';
        $content .= 'Hello ' . $this->request->getParameter('name', 'stranger');
        $this->response->setContent($content);
    }
}