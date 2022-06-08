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
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $query = "SELECT * FROM shows_list";
        $statement = $db->prepare($query);
        $statement->execute();

        $statement->setFetchMode(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
        $result = $statement->fetchAll();

        $names_array = [];
        $channels_array = [];

        if ($result) {
            foreach($result as $row) {
                if (!in_array($row->name, $names_array) && !in_array($row->channel, $channels_array)) {
                    $names_array[] = $row->name;
                    $channels_array[] = $row->channel;
                }
            }
        }

        $showsForm = View::make('shows/SearchBar', [
                'value0'         => $value0,
                'value1'         => $value1,
                'names_array'    => $names_array,
                'channels_array' => $channels_array,
            ]
        );
        return $showsForm;
    }

}