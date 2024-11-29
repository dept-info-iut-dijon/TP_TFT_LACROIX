<?php

namespace Controllers\Router;

abstract class Route {
    protected $params;
    protected $method;

    public function __construct($params, $method) {
        $this->params = $params;
        $this->method = $method;
    }

    public function action($params = [], $method = 'GET') {
        if ($method === 'POST') {
            $this->post($params);
        } else {
            $this->get($params);
        }
    }

    protected function getParam(array $array, string $paramName, bool $canBeEmpty=true)
    {
        if (isset($array[$paramName])) {
            if(!$canBeEmpty && empty($array[$paramName]))
                throw new Exception("Paramètre '$paramName' vide");
            return $array[$paramName];
        } else
            throw new Exception("Paramètre '$paramName' absent");
    }

    public function get($params = []) {
        $this->controller->index($params);
    }

    public function post($params = []) {
        $this->controller->index($params);
    }
}
