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
            'main' => new \Controllers\MainController()
        ];
    }

    public function createRouteList() {
        $this->routeList = [
            'index' => new \Controllers\Router\Route\RouteIndex($this->ctrlList['main'])
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