<?php

namespace Controllers\Router\Route;

use Controllers\Router\Route;
use Models\Unit;
use Models\UnitDAO;

class RouteUpdateUnit extends Route {
    private $controller;

    public function __construct($controller, $params = [], $method = 'GET') {
        parent::__construct($params, $method);
        $this->controller = $controller;
    }

    public function get($params = []) {
        if (isset($params['id'])) {
            $idUnit = $params['id'];
            $unitDAO = new UnitDAO();
            $unit = $unitDAO->getByID($idUnit);
            if ($unit) {
                $templates = new \League\Plates\Engine('Views');
                echo $templates->render('add-unit', ['unit' => $unit]);
            } else {
                $this->controller->displayAddUnit("id not found");
            }
        } else {
            $this->controller->displayAddUnit("id not found");
        }
    }

    public function post($params = []) {
        if (isset($params['id'], $params['unitName'], $params['unitCost'], $params['unitOrigin'], $params['unitUrlImg'])) {
            $this->controller->editUnitAndIndex($params);
        } else {
            $this->controller->displayAddUnit("Missing required parameters.");
        }
    }
}