<?php

namespace App\PageControllers;

use App\ViewsControllers\View;
use PDO;

class DashboardController
{

    public function update(): string
    {
        return 'data';
    }

    public function store(): View
    {

        $value0 = 0;
        $value1 = 1;

        $db = new PDO('mysql:host=db;dbname=favorite_shows_list', 'root', 'changeme');
        $stmt = $db->query("SELECT * FROM shows_list");
        $res =  $stmt->fetchAll();


        $showsForm = View::make('shows/SearchBar', [
                'value0' => $value0,
                'value1' => $value1,
            ]
        );
        return $showsForm;

    }

}