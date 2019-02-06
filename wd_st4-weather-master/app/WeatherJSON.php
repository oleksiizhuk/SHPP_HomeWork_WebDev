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

    public function getValue()
    {
        $get = $this->checkJson($this->jsonPath);
        $arr = [];
        foreach ($get['list'] as $key => $value) {
            $arr[$key]['date'] = $value['dt_txt'];
            $arr[$key]['temperature'] = $value['main']['temp'];
            $arr[$key]['icon'] = $value['weather'][0]['description'];
            if ($key == 6) {
                break;
            }
        }
        /*foreach ($get['list'] as $key => $value) {
            $arr[$key] = $value;
        }*/
        echo json_encode($arr);
    }

    private function checkJson($urlJson)
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