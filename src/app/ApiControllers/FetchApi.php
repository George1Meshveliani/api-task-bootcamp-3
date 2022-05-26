<?php


namespace App\ApiControllers;


class FetchApi {

    private string|array $url;

    public function __construct(string|array $url) {
        $this->url = $url;
    }

    public function getData() {
        $data = curl_init($this->url);
        curl_setopt($data, CURLOPT_URL, $this->url);
        curl_setopt($data, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            "User-Agent: ReqBin Curl Client/1.0",
        ];
        curl_setopt($data, CURLOPT_HTTPHEADER, $headers);

        $response =json_decode(curl_exec($data));
        curl_close($data);

        return $response;
    }
}