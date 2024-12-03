<?php

namespace Controllers;

use Models\Unit;
use Models\UnitDAO;

class UnitController {
    public function displayAddOrigin() {
        $templates = new \League\Plates\Engine('Views');
        echo $templates->render('add-origin');
    }

    private $mainController;

    public function __construct() {
        $this->mainController = new MainController();
    }

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

            header('Location: index.php?action=index');
            exit();
        } catch (\Exception $e) {
            $this->displayAddUnit($e->getMessage());
        }
    }

    public function editUnitAndIndex(array $dataUnit) {
        try {
            $unit = new Unit();
            $unit->setId($dataUnit['id']);
            $unit->setName($dataUnit['unitName']);
            $unit->setCost($dataUnit['unitCost']);
            $unit->setOrigin($dataUnit['unitOrigin']);
            $unit->setUrlImg($dataUnit['unitUrlImg']);

            $unitDAO = new UnitDAO();
            if ($unitDAO->getByID($dataUnit['id'])) {
                $unitDAO->updateUnit($unit);
                $message = "Unit updated successfully.";
            } else {
                $unitDAO->createUnit($unit);
                $message = "Unit added successfully.";
            }

            $this->mainController->index($message);
        } catch (\Exception $e) {
            $this->displayAddUnit($e->getMessage());
        }
    }

    public function deleteUnitAndIndex(string $idUnit) {
        $unitDAO = new UnitDAO();
        try {
            $unitDAO->deleteUnit($idUnit);
            $message = "Unit deleted successfully.";
        } catch (\Exception $e) {
            $message = "Failed to delete unit: " . $e->getMessage();
        }
        $this->displayIndex($message);
    }

    public function displayIndex(?string $message = null) {
        $unitDAO = new UnitDAO();
        $listUnit = $unitDAO->getAll();
        $templates = new \League\Plates\Engine('Views');
        echo $templates->render('home', ['listUnit' => $listUnit, 'message' => $message]);
    }

}