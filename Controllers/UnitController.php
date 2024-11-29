<?php

namespace Controllers;

class UnitController {
    public function displayAddUnit() {
        $templates = new \League\Plates\Engine('Views');
        echo $templates->render('add-unit');
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