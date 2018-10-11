<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST' ) {
    header("location:index.php"); 
}

$config = require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR .  'config.php';

require_once $config['dataBase'];
$valueVote = require_once $config['valueVote'];
$dataBase = new DataBase($config['urlJson'], $valueVote);


if (isset($_POST['radio'])) {
	try{
		$dataBase->addVote($_POST['radio']);
		header("Location:result.php");
	} catch (Exception $e){
		$_SESSION["error"] = $e->getMessage();
		header("location:index.php");
	}
}

if (isset($_POST['getJson'])) {
    $result = $dataBase->ajaxGetJson();
    print_r($result);
}
