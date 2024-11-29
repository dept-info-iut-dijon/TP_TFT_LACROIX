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

            $unit = new Unit($data);

            $unitDAO = new UnitDAO();
            $unitDAO->createUnit($unit);

            $this->displayIndex("Unit added successfully.");
        } catch (\Exception $e) {
            $this->displayAddUnit($e->getMessage());
        }
    }

    public function displayAddOrigin() {
        $templates = new \League\Plates\Engine('Views');
        echo $templates->render('add-origin');
    }

    public function deleteUnit($params = []) {
        // Logique de suppression de l'unité
        $message = "Unit deleted successfully.";
        $templates = new \League\Plates\Engine('Views');
        echo $templates->render('index', ['message' => $message]);
    }

    public function updateUnit($params = []) {
        $templates = new \League\Plates\Engine('Views');
        echo $templates->render('add-unit', ['id' => $params['id']]);
    }
}