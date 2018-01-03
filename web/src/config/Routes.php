<?php declare(strict_types = 1);

return [
    ['GET', '/', function () {
        echo 'Hello World';
    }],
    ['GET', '/route', function () {
        echo 'This works too';
    }],
];