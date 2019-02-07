<?php
/**
 * Created by PhpStorm.
 * User: Oleks
 * Date: 30.01.2019
 * Time: 19:12
 */

namespace app;


use mysql_xdevapi\Exception;

class WeatherAPI
{
    private $pathApi = 'http://dataservice.accuweather.com/forecasts/v1/hourly/12hour/324291?apikey=tc9cdAvLYnDUhK3Whr5Tt2vxQK9BRRCG';

    //private $pathApi = 'http://dataservice.accuweather.com/forecasts/v1/hourly/12hour/324291?apikey=SMpssiVeGI6nviTozNlzGg335eeZHhUt';

    public function __construct()
    {

    }

    public function getValue()
    {
        $weather = json_decode(@file_get_contents($this->pathApi));

        if (empty($weather)) {
            throw new Exception("empty api");
        }

        echo json_encode($weather);
    }

}
