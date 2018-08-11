<?php

$config = require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'privat' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR .  'config.php';

require $config['dataBase'];
$userChoice = $_POST['radio'];

$dataBase = new DataBase($config['dataBase']);

$dataBase->addVote($userChoice);
$test = $dataBase->checkJson();

echo $test;

header("Location:result.php");
