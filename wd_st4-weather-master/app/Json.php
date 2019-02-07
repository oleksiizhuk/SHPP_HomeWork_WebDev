<?php

namespace app;

use core\WeatherInterface;

class Json implements WeatherInterface
{

    private $jsonPath;

    public function __construct($jsonPath)
    {
        $this->jsonPath = $jsonPath;
        //$this->jsonPath = require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'today.json';
    }

    public function getValue()
    {
        $get = $this->checkJson();
        $arr = [];
        foreach ($get['list'] as $key => $value) {
            $arr[$key]['date'] = $value['dt_txt'];
            $arr[$key]['temperature'] = $value['main']['temp'];
            $arr[$key]['icon'] = $value['weather'][0]['description'];
            if ($key == 7) {
                break;
            }
        }
        /*foreach ($get['list'] as $key => $value) {
            $arr[$key] = $value;
        }*/
        echo json_encode($arr);
    }

    public function checkJson()
    {
        if (!file_exists($this->jsonPath)) {
            throw new \Exception("File is nit found");
        }
        if (!is_file($this->jsonPath) && !is_readable($this->jsonPath) && !is_writable($this->jsonPath)) {
            throw new \Exception('Incorrect db');
        }
        $jsonContent = json_decode(file_get_contents($this->jsonPath), true);
        if (!$jsonContent && json_last_error()) {
            throw new \Exception("at An encoding/decoding error has occurred.");
        }
        return $jsonContent;
    }
}