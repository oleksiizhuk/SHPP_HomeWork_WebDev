<?php

if (isset($_POST['getJson'])) {
    $config = require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'privat' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR .  'config.php';
    require $config['dataBase'];
    $data = new DataBase($config['dataBase']);
    $result = $data->ajaxGetJson();
    echo $result;
}




