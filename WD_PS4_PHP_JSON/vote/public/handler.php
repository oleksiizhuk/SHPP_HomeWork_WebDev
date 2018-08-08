<?php

$config = require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'privat' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR .  'config.php';

require $config['setAndGetJson'];
$userChoice = $_POST['radio'];

$dataBase = new DataBase($config['setAndGetJson']);

$dataBase->addVote($userChoice);
$test = $dataBase->checkJson();
echo $test;


header("Location:result.php");


?>

