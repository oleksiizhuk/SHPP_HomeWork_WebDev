<?php


require_once 'app/Kropivnitskiy.php';
require_once 'app/Lviv.php';

$kirov = new Kropivnitskiy();
$lviv = new Lviv();

print_r("
    Температура в Кирове" . $kirov->getTemperature() . "
    Температура в Львое" . $lviv->getTemperature() .
        "
    Координаты в Кирове" . $kirov->getCoords() . "
    Координаты в Львое" . $lviv->getCoords()
    );