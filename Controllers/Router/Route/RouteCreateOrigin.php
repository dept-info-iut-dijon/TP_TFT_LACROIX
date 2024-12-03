<?php

namespace Controllers\Router\Route;

use Controllers\Router\Route;

class RouteCreateOrigin extends Route {
    private $controller;

    public function __construct($controller, $params = [], $method = 'POST') {
        parent::__construct($params, $method);
        $this->controller = $controller;
    }

    public function get($params = []) {
        $this->controller->displayAddOrigin();
    }

    public function post($params = []) {
        if (isset($params['name'], $params['url_img'])) {
            $this->controller->createOriginAndIndex($params);
        } else {
            $this->controller->displayAddOrigin("Missing required parameters.");
        }
    }
}