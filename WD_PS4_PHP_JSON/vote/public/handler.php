<?php /** @noinspection PhpUnhandledExceptionInspection */
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST' ) {
    header("location:index.php"); 
}
$config = require_once  dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR .  'config.php';

require_once DataBase;
$valueVote = require_once VALUE_VOTE;
$dataBase = new DataBase(URL_JSON, $valueVote);


if (isset($_POST['radio'])) {
	try{
		$dataBase->addVote($_POST['radio']);
		header("Location:result.html");
	} catch (Exception $e){
		$_SESSION["error"] = $e->getMessage();
		header("location:index.php");
	}
}

if (isset($_POST['getJson'])) {
    $result = $dataBase->ajaxGetJson();
    print_r($result);
}
