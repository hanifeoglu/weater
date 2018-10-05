<?php
/**
 * Created by PhpStorm.
 * User: Volkan
 * Date: 5.10.2018
 * Time: 19:27
 */

class Weather{

    private $apiUrl = 'http://volkansengul.com/havadurumu/';
    private $apiKey;
    private $city;

    public function __construct($apiKey)
    {
        $this->apiKey = md5($apiKey);

    }

    public function GetCurrentWeather($city){
        return $this->CallApi('',[
            'city' => $city,
        ]);
    }

    public function GetDetailedWeather($city_id){
        $this->apiUrl = $this->apiUrl.'detay.php';
        return $this->CallApi('',[
            'city_id' => $city_id,
        ]);
    }

    private function CallApi($method,$params){
        $params['app_id'] = $this->apiKey;
        $params = http_build_query($params);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->apiUrl.'?'.$params
        ));
        $resp = curl_exec($curl);
        $resp = json_decode($resp);
        curl_close($curl);
        return $resp;
    }


}