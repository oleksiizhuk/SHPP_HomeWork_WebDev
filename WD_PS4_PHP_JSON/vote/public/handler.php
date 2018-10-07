<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location:index.php"); 
}

$config = require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR .  'config.php';

require $config['dataBase'];
$dataBase = new DataBase($config['urlJson']);
$valueVote = include $config['valueVote'];


if (isset($_POST['radio'])) {
	$userChoice = $_POST['radio'];
	if ($dataBase->checkJsonUrl()) {
		$dataBase->addVote($userChoice);    
		header("Location:result.php");
		exit;
	} else {
		$dataBase->createJson($valueVote);
		$dataBase->addVote($userChoice);
		header("Location:result.php");
		exit;
	}
}

if (isset($_POST['getJson'])) {
    $result = $dataBase->ajaxGetJson();
    print_r ($result);
}