<?php declare(strict_types = 1);

return [
    ['GET', '/', ['RestApi\Controllers\RecipesController', 'show']],
    ['GET', '/route', function () {
        echo 'This works too';
    }],
];