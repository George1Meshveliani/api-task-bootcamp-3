<?php

require __DIR__ . '/../vendor/autoload.php';


use App\ApiControllers\FetchApi;

$repos_url = "https://api.tvmaze.com/search/shows?q=girls";
$data = new FetchApi($repos_url);

$results = $data->getData();

foreach ($results as $result) {
    echo $result->show->id . ' ' . '<br />';
}

//$repos_data = curl_init($repos_url);
//curl_setopt($repos_data, CURLOPT_URL, $repos_url);
//curl_setopt($repos_data, CURLOPT_RETURNTRANSFER, true);
//
//
//$headers = array(
//    "User-Agent: ReqBin Curl Client/1.0",
//);
//curl_setopt($repos_data, CURLOPT_HTTPHEADER, $headers);
//
//$repos_response =json_decode(curl_exec($repos_data));
//curl_close($repos_data);
//
////print_r($repos_response);
//
//foreach ($repos_response as $response) {
//    echo $response->show->id . '<br />';
//}