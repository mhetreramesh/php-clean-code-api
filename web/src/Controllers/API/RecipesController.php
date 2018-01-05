<?php declare(strict_types = 1);

namespace RestApi\Controllers\API;

use Http\Request;
use Http\Response;

class RecipesController extends BaseApiController
{
    public function __construct(Request $request, Response $response)
    {
        parent::__construct($request, $response);
    }

    public function show()
    {
        $content = '<h1>Hello World</h1>';
        $content .= 'Hello ' . $this->request->getParameter('name', 'stranger');
        $this->response->setContent($content);
    }
}