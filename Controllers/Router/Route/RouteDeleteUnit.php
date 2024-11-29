<?php

namespace Controllers\Router\Route;

use Controllers\Router\Route;

class RouteDeleteUnit extends Route {
    private $controller;

    public function __construct($controller, $params = [], $method = 'GET') {
        parent::__construct($params, $method);
        $this->controller = $controller;
    }

    public function get($params = []) {
        $this->controller->deleteUnit($params);
    }

    public function post($params = []) {

    }
}