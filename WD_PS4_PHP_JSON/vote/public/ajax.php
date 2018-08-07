<?php

$config = require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'privat' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR .  'config.php';

require $config['setAndGetJson'];

$data = new DataBase($config['setAndGetJson']);
$result = $data->checkJson();

echo $result;
