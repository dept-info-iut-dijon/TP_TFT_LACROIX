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
        if (isset($params['id'])) {
            $idUnit = $params['id'];
            $this->controller->deleteUnitAndIndex($idUnit);
        } else {
            $this->controller->deleteUnitAndIndex(-1);
        }
    }

    public function post($params = []) {

    }
}