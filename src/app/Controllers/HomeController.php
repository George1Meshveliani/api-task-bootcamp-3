<?php


namespace App\Controllers;

use App\ViewsControllers\View;
use App\ApiControllers\FetchApi;

class HomeController {
    public function index(): string {
        return 'Data';
    }

    public function update(): View {
        $url = "https://api.tvmaze.com/search/shows?q=girls";
        $data = new FetchApi($url);

        $results = $data->getData();

        return View::make('shows/GirlsShow',
            [
                'results' => $results,
            ]
        );
    }

//    public function store(): View {
//        $url = "https://api.tvmaze.com/search/shows?q=girls";
//        $data = new FetchApi($url);
//
//        $results = $data->getData();
//
//        $shows = View::make('shows/GirlsShow', [
//                'results' => $results,
//            ]
//        );
//        return $shows;
//
//    }
}