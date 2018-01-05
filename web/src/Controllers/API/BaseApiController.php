<?php declare(strict_types = 1);

namespace RestApi\Controllers\API;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class BaseApiController
{
    protected $request;
    protected $response;
    protected $fractal;

    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response;
        $this->fractal = new Manager();
    }
}