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
}