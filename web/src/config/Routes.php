<?php declare(strict_types = 1);

return [
    ['GET', '/', ['RestApi\Controllers\RecipesController', 'show']],
    ['GET', '/route', ['RestApi\Controllers\RecipesController', 'show']]
];