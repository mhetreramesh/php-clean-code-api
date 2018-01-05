<?php declare(strict_types = 1);

return [
    ['GET', '/', ['RestApi\Controllers\HomeController', 'show']],
    ['GET', '/recipes', ['RestApi\Controllers\API\RecipesController', 'show']]
];