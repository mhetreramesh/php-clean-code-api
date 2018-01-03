<?php declare(strict_types = 1);

$request = new \Http\HttpRequest($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
$response = new \Http\HttpResponse;

$content = '<h1>Hello World</h1>';
$response->setContent($content);

foreach ($response->getHeaders() as $header) {
    header($header, false);
}

echo $response->getContent();