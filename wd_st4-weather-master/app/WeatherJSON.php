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
        print_r($get);
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