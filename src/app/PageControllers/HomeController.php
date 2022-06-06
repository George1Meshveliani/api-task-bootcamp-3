<?php


namespace App\PageControllers;

use App\DatabaseControllers\InsertExample;
use App\ViewsControllers\View;
use App\ApiControllers\FetchApi;
use PDO;

class HomeController {

    public function index(): View {
        $url = "https://api.tvmaze.com/search/shows?q=girls";
        $data = new FetchApi($url);

        $results = $data->getData();

//        $db = new PDO('mysql:host=db;dbname=favorite_shows_list', 'root', 'changeme');
//        $data_to_insert = new InsertExample($db);
//        $data_to_insert->insertDataExample( 'shows_list');

        return View::make('shows/GirlsShow',
            [
                'results' => $results,
            ]
        );
    }

    public function update() {
        return 'Imported Data';
    }


//    public function store(): View {
//
//        $value0 = 0;
//        $value1 = 1;
//
//        $showsForm = View::make('shows/SearchBar', [
//                'value0' => $value0,
//                'value1' => $value1,
//            ]
//        );
//        return $showsForm;
//
//    }
}