<?php

namespace Controllers\Router\Route;

class RouteIndex extends Route {
    private $controller;

    public function __construct($controller, $params = [], $method = 'GET') {
        parent::__construct($params, $method);
        $this->controller = $controller;
    }

    public function get($params = []) {
        $this->controller->index($params);
    }

    public function post($params = []) {
        $this->controller->index($params);
    }
}
