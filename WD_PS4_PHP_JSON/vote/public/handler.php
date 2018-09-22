<?php
session_start();

$config = require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'privat' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR .  'config.php';

require $config['dataBase'];
$dataBase = new DataBase($config['dataBase']);

if (isset($_POST['radio'])){
	$userChoice = $_POST['radio'];

}

$dataBase->addVote($userChoice);	
header("Location:result.php");



try{

} catch( Exception $ex) {
	$_SESSION['er'] = "error";
}

session_destroy();
