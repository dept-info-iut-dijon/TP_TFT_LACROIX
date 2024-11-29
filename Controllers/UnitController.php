<?php

namespace Controllers;

use Models\Unit;
use Models\UnitDAO;

class UnitController {
    public function displayAddUnit(?string $message = null) {
        $templates = new \League\Plates\Engine('Views');
        echo $templates->render('add-unit', ['message' => $message]);
    }

    public function addUnit(array $data) {
        try {
            $data['id'] = uniqid();

            $unit = new Unit();
            $unit->setId($data['id']);
            $unit->setName($data['name']);
            $unit->setCost($data['cost']);
            $unit->setOrigin($data['origin']);
            $unit->setUrlImg($data['url_img']);

            $unitDAO = new UnitDAO();
            $unitDAO->createUnit($unit);

            header('Location: /');
            exit();
        } catch (\Exception $e) {
            $this->displayAddUnit($e->getMessage());
        }
    }

    public function displayAddOrigin() {
        $templates = new \League\Plates\Engine('Views');
        echo $templates->render('add-origin');
    }

    public function deleteUnit($params = []) {
        $message = "Unit deleted successfully.";
        $templates = new \League\Plates\Engine('Views');
        echo $templates->render('index', ['message' => $message]);
    }

    public function updateUnit($params = []) {
        $templates = new \League\Plates\Engine('Views');
        echo $templates->render('add-unit', ['id' => $params['id']]);
    }
}