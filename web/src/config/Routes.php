<?php declare(strict_types = 1);

return [
    ['GET', '/', ['RestApi\Controllers\HomeController', 'show']],
    ['GET', '/recipes', ['RestApi\Controllers\API\RecipesController', 'index']],
    ['GET', '/recipes/{id}', ['RestApi\Controllers\API\RecipesController', 'show']],
    ['POST', '/recipes', ['RestApi\Controllers\API\RecipesController', 'create']],
    [['PUT', 'PATCH'], '/recipes/{id}', ['RestApi\Controllers\API\RecipesController', 'update']],
    ['DELETE', '/recipes/{id}', ['RestApi\Controllers\API\RecipesController', 'delete']]
];