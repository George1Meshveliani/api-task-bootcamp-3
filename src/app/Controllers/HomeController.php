<?php


namespace App\Controllers;


use App\ViewsControllers\View;
use Ramsey\Uuid\Uuid;

class HomeController {
    public function index(): string {
        return 'Data';
    }

    public function update(): View {

        return View::make('forms/form');
    }

    public function store() {
        $form = View::make('forms/form');

        $userName = $_POST['userName'];

        $repos_url = "https://api.github.com/users/{$userName}/repos";
        $followers_url = "https://api.github.com/users/{$userName}/followers";

        $repos_data = curl_init($repos_url);
        $followers_data = curl_init($followers_url);
        curl_setopt($repos_data, CURLOPT_URL, $repos_url);
        curl_setopt($repos_data, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($followers_data, CURLOPT_URL, $followers_url);
        curl_setopt($followers_data, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "User-Agent: ReqBin Curl Client/1.0",
        );
        curl_setopt($repos_data, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($followers_data, CURLOPT_HTTPHEADER, $headers);

        $repos_response =json_decode(curl_exec($repos_data));
        $followers_response =json_decode(curl_exec($followers_data));
        curl_close($repos_data);
        curl_close($followers_data);


        $repos = View::make('user/githubInfo',
            [
                'repos_response' => $repos_response,
                'followers_response' => $followers_response,
                'userName' => $userName,
            ]
        );

        return $form . $repos;

    }
}