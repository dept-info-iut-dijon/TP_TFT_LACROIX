<?php

namespace Controllers\Router\Route;

use Controllers\Router\Route;

class RouteAddUnit extends Route {
    private $controller;

    public function __construct($controller, $params = [], $method = 'GET') {
        parent::__construct($params, $method);
        $this->controller = $controller;
    }

    public function get($params = []) {
        $this->controller->displayAddUnit();
    }

    public function post($params = []) {
        try {
            $data = [
                "name" => $this->getParam($params, "unitName", false),
                "cost" => $this->getParam($params, "unitCost", false),
                "origin" => $this->getParam($params, "unitOrigin", false),
                "url_img" => $this->getParam($params, "unitUrlImg", false)
            ];
            $this->controller->addUnit($data);
        } catch (Exception $e) {
            $this->controller->displayAddUnit($e->getMessage());
        }
    }
}