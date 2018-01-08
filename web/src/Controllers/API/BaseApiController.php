<?php declare(strict_types = 1);

namespace RestApi\Controllers\API;

use Http\HttpRequest;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class BaseApiController
{
    protected $request;
    protected $response;
    protected $fractal;

    public function __construct($response)
    {
        //$this->request = $request;
        $this->request = new HttpRequest($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER, file_get_contents('php://input'));
        $this->response = $response;
        $this->fractal = new Manager();
    }
}