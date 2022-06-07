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

        var_dump($res);
//        $row_array_zero = [];
//        $row_array_one = [];
//        while ($rows = $stmt->fetch(PDO::FETCH_NUM)) {
//            $row_array_zero = $rows[0];
//            $row_array_one  = $rows[1];
//        }
//        var_dump($row_array_zero);

        $showsForm = View::make('shows/SearchBar', [
                'value0' => $value0,
                'value1' => $value1,
            ]
        );
        return $showsForm;

    }

}