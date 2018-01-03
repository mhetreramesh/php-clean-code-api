<?php declare(strict_types = 1);

$request = new \Http\HttpRequest($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
$response = new \Http\HttpResponse;

echo "Hello World from HelloFresh";