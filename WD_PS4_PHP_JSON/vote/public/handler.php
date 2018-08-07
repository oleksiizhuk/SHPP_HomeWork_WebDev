<?php

$config = require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'privat' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR .  'config.php';

require $config['setAndGetJson'];
$userChoice = $_POST['radio'];
echo $userChoice. " - 1";
$dataBase = new DataBase($config['setAndGetJson']);
var_dump($dataBase);
$dataBase->addVote($userChoice);

header("Location:result.php");


?>

