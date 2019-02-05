<?php
/**
 * Created by PhpStorm.
 * User: Oleks
 * Date: 30.01.2019
 * Time: 19:12
 */

namespace app;


class WeatherJSON
{

    private $jsonPath;

    public function __construct($jsonPath)
    {
        $this->jsonPath = $jsonPath;
    }

    public function test()
    {
        $get = $this->check($this->jsonPath);
        $keys = [];
        /*foreach ($get['list'] as $key => $value) {
            $keys[$key]['date'] = $value['dt_txt'];
            $keys[$key]['temperature'] = $value['main']['temp'];
            $keys[$key]['icon'] = $value['weather'][0]['description'];
        }*/
        foreach ($get['list'] as $key => $value) {
            $keys[$key] = $value;
        }
        echo json_encode($keys);
    }

    private function check($urlJson)
    {
        if (!file_exists($urlJson)) {
            throw new Exception("File is nit found");
        }
        if (!is_file($urlJson) && !is_readable($urlJson) && !is_writable($urlJson)) {
            throw new Exception('Incorrect db');
        }
        $jsonContent = json_decode(file_get_contents($urlJson), true);
        if (!$jsonContent && json_last_error()) {
            throw new Exception("at An encoding/decoding error has occurred.");
        }
        return $jsonContent;
    }
}