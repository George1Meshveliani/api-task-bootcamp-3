<?php


namespace App\Controllers;

use App\ViewsControllers\View;
use App\ApiControllers\FetchApi;
use PDO;

class HomeController {
    public function index(): string {
        return 'Data';
    }

    public function update(): View {
        $url = "https://api.tvmaze.com/search/shows?q=girls";
        $data = new FetchApi($url);

        $results = $data->getData();

        try {
            $db = new PDO('mysql:host=db;dbname=favorite_shows_database', 'root', 'changeme');

            $name = "TV show";
            $channel = "BBC";

            $query = 'INSERT INTO shows_list (name, channel)
              VALUES (:name, :channel)';
            $id_query = 'SELECT * FROM shows_list WHERE id =';

            $stmt = $db->prepare($query);

            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':channel', $channel);

            $stmt->execute();

            $id = (int) $db->lastInsertId();

            $show = $db->query($id_query . $id)->fetch();

        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }

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