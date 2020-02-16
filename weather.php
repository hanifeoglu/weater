<?php


class Weather{

    private $apiUrl = 'http://api.openweathermap.org/data/2.5/forecast';
    private $apiKey = '3e052d0ed5425b63f9d6734870bd7cb1';

    public function GetCurrentWeather($id){
        return $this->CallApi('',[
            'id' => $id,
        ]) ;
    }

    public function GetDetailedWeather($city_code){
        return $this->CallApi('',[
            'id' => $city_code,
        ]);
    }

    private function CallApi($method,$params){
        $params = http_build_query($params);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->apiUrl.'?'.$params.'&lang=tr&units=metric&appid='.$this->apiKey
        ));
        $resp = curl_exec($curl);
        $resp = json_decode($resp);
        curl_close($curl);
        return $resp;

    }


}