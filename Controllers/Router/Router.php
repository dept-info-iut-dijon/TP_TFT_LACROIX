<?php

namespace Controllers\Router;

class Router {
    private $routeList = [];
    private $ctrlList = [];
    private $actionKey;

    public function __construct($nameOfActionKey = 'action') {
        $this->actionKey = $nameOfActionKey;
        $this->createControllerList();
        $this->createRouteList();
    }

    public function createControllerList() {
        $this->ctrlList = [
            'main' => new \Controllers\MainController(),
            'unit' => new \Controllers\UnitController()
        ];
    }

    public function createRouteList() {
        $this->routeList = [
            'index' => new \Controllers\Router\Route\RouteIndex($this->ctrlList['main']),
            'add-unit' => new \Controllers\Router\Route\RouteAddUnit($this->ctrlList['unit']),
            'search' => new \Controllers\Router\Route\RouteSearch($this->ctrlList['main']),
            'add-unit-origin' => new \Controllers\Router\Route\RouteAddOrigin($this->ctrlList['unit']),
            'del-unit' => new \Controllers\Router\Route\RouteDeleteUnit($this->ctrlList['unit']),
            'update-unit' => new \Controllers\Router\Route\RouteUpdateUnit($this->ctrlList['unit'])
        ];
    }

    public function routing($get, $post) {
        $action = $get[$this->actionKey] ?? 'index';
        if (isset($this->routeList[$action])) {
            $route = $this->routeList[$action];
            $method = $_SERVER['REQUEST_METHOD'];
            $params = $method === 'POST' ? $post : $get;
            $route->action($params, $method);
        } else {
            echo "Route not found.";
        }
    }
}