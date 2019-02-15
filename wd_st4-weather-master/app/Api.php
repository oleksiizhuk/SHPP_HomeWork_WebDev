<?php
/**
 * Created by PhpStorm.
 * User: Oleks
 * Date: 30.01.2019
 * Time: 19:12
 */

namespace app;

use core\WeatherInterface;

class Api implements WeatherInterface
{
    private $pathApi;
    //запасной вариант
    //private $pathApi = 'http://dataservice.accuweather.com/forecasts/v1/hourly/12hour/324291?apikey=SMpssiVeGI6nviTozNlzGg335eeZHhUt';

    public function __construct()
    {
        $this->pathApi = 'http://dataservice.accuweather.com/forecasts/v1/hourly/12hour/324291?apikey=tc9cdAvLYnDUhK3Whr5Tt2vxQK9BRRCG';

    }

    public function getValue()
    {

        $weather = json_decode(@file_get_contents($this->pathApi), true);

        if (empty($weather)) {
            throw new \Exception("empty api");
        }
        $arr = [];
        foreach ($weather as $key => $value) {
            $arr[$key]['date'] = $value['DateTime'];
            $arr[$key]['temperature'] = $this->convertFahrenheitToCelsius($value['Temperature']['Value']);
            //$arr[$key]['degree'] = $value['Temperature']['Unit'];
            $arr[$key]['icon'] = $this->convertIcon($value['IconPhrase']);
            if ($key == 7) {
                break;
            }
        }
        // echo json_encode($weather);
        echo json_encode($arr);
    }

    private function convertIcon($icon)
    {
        if ($icon === "Cloudy") {
            return "sky";
        }

        if ($icon === "Rain and snow") {
            return "rain";
        }

        if ($icon === "light rain") {
            return "rain";
        }

        if ($icon === "moderate rain") {
            return "rain";
        }
        return $icon;
    }

    private function convertFahrenheitToCelsius($Fahrenheit)
    {
        return round(($Fahrenheit - 32) / 1.8);
    }
}
