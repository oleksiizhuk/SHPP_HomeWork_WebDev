<?php
session_start();
$config = require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR .  'config.php';

require_once( $config['dataBase']);
$dataBase = new DataBase($config['urlJson']);


if (isset($_POST['radio'])) {
	$userChoice = $_POST['radio'];
	if ($dataBase->checkJsonUrl()) {
		$dataBase->addVote($userChoice);    
		header("Location:result.php");
		exit;
	} else {
		$_SESSION['error'] = $dataBase->getError();
		header("Location:index.php");
		exit;
	}
}

if (isset($_POST['getJson'])) {
    $result = $dataBase->ajaxGetJson();
    print_r ($result);
}



