<?php

namespace app;

use core\WeatherInterface;

class Json implements WeatherInterface
{

    private $jsonPath;

    public function __construct($jsonPath)
    {
        $this->jsonPath = $jsonPath;
    }

    public function getValue()
    {
        $get = $this->checkJson();
        $arr = [];
        foreach ($get['list'] as $key => $value) {
            $arr[$key]['date'] = $value['dt_txt'];
            $arr[$key]['temperature'] = $this->convertKelvinToCelsius($value['main']['temp']);
            $arr[$key]['icon'] = $this->convertIcon($value['weather'][0]['description']);
            if ($key == 7) {
                break;
            }
        }
        echo json_encode($arr);
    }

    private function convertKelvinToCelsius($kelvin)
    {
        return round(($kelvin - 273.15));
    }

    private function convertIcon($icon)
    {
        if ($icon === "clear sky") {
            return "sun";
        }
        if ($icon === "light rain") {
            return "rain";
        }
        if ($icon === "broken clouds") {
            return "sky";
        }
        if ($icon === "moderate rain") {
            return "rain";
        }
        return $icon;
    }

    private function checkJson()
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