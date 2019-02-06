<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'autoloader.php';
$config = require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';

use app\WeatherDB;
use app\WeatherJSON;
use app\WeatherAPI;


if (isset($_GET['function'])) {
    if ($_GET['function'] === 'Database') {
        try {
            $weatherDB = new WeatherDB();
            $weatherDB->getValueWeather();
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    if ($_GET['function'] === 'JSON') {
        try {
            $weatherJSON = new WeatherJSON($config['json']);
            $weatherJSON->getValue();
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    if ($_GET['function'] === 'API') {
        $weatherApi = new WeatherAPI();
        $weatherApi->parse();
    }
}


