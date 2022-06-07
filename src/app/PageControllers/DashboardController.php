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
//        $stmt = $db->query("SELECT * FROM shows_list");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM shows_list";
        $statement = $db->prepare($query);
        $statement->execute();

        $arr1 = [];
        $statement->setFetchMode(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
        $result = $statement->fetchAll();
        if($result)
        {
            foreach($result as $row)
            {
                $arr1[] = $row->name;
                ?>
                <tr>
                    <td>  <?=  "name - " . $row->name; ?></td>
                    <td><?= "channel - " . $row->channel; ?></td>
                </tr>

                <?php
            }
        }
        var_dump($arr1);
//        $res =  $stmt->fetch(PDO::FETCH_NUM);
//        var_dump($res);
//        foreach ($res as $r) {
//            echo $r->name;
//        }
        $showsForm = View::make('shows/SearchBar', [
                'value0' => $value0,
                'value1' => $value1,
            ]
        );
        return $showsForm;

    }

}