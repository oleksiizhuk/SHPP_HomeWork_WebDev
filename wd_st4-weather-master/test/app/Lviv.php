<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 08.02.2019
 * Time: 11:35
 */

require_once 'Location.php';
require_once 'Weather.php';

class Lviv implements Location, Weather
{

    function getCoords()
    {
        echo '1x 2y';
    }

    function getTemperature()
    {
        echo '1c';
    }

    function getWindSpeed()
    {
        echo '33ms';
    }

    function getWet()
    {
        echo '52chegototam';
    }
}