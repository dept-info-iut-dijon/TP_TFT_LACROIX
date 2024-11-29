<?php

namespace Controllers;
use Models\UnitDAO;


class MainController
{
    private $templates;

    /**
     * @param $templates
     */
    public function __construct()
    {
        $this->templates = new \League\Plates\Engine('Views');
    }

    public function index(): void
    {
        $unitDAO = new UnitDAO();

        $listUnit = $unitDAO->getAll();
        $first = $unitDAO->getByID('1');
        $other = $unitDAO->getByID('non_existing_id');

        echo $this->templates->render('home', [
            'tftSetName' => 'Remix Rumble',
            'listUnit' => $listUnit,
            'first' => $first,
            'other' => $other
        ]);
    }
    public function search($params = []) {
        $templates = new \League\Plates\Engine('Views');
        echo $templates->render('search');
    }
}