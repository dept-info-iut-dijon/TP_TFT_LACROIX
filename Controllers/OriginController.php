<?php

namespace Controllers;

use Models\Origin;
use Models\OriginDAO;

class OriginController {
    private $mainController;

    public function __construct() {
        $this->mainController = new MainController();
    }


}