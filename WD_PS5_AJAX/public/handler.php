<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST' ) {
    header("location:index.php"); 
}
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$config = require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';
require_once $config['CheckJsonFile'];

if (isset($_POST['submit'])) {
	require_once $config['Verification'];
	$verification = new Verification($_POST['login'], $_POST['password'], $config['usersJson']);
	try{
		$verification->verification();
		$_SESSION['login'] = $_POST['login'];
		header("location:chat.php");
	} catch (Exception $exception) {
		getError($exception->getMessage());
	}
}

if (isset($_POST['getMsg'])) {
    require_once $config['JsonHandler'];
	$UnloadMsg = new JsonHandler($config['messageJson']);
	try{
		$message = $UnloadMsg->getMassage();
		print_r($message);
	} catch(Exception $exception) {
		getError($exception->getMessage());
	}
}

if (isset($_POST['addNewMsg'])) {
	require_once $config['JsonHandler'];
	$userCheck = new JsonHandler($config['messageJson']);
	$message = $_POST['addNewMsg'];
	$data = date("H:i:s");
	$dateToSecond = strtotime(date("Y-m-d H:i:s"));
	try {
		$userCheck->addNewMessageToJson($dateToSecond, $message);
		echo $data.','.$_SESSION['login'];		
	} catch(Exception $exception) {
		getError($exception->getMessage());
	}
}

if (isset($_POST['checkNewMessage'])) {
	$count = $_POST['checkNewMessage'];
	require_once $config['JsonHandler'];
	$UnloadMsg = new JsonHandler($config['messageJson']);

	try{
		$message = $UnloadMsg->unloadNewMessage($_POST['checkNewMessage']);
		print_r(json_encode($message, JSON_PRETTY_PRINT));
	} catch(Exception $exception) {
		getError($exception->getMessage());
	}
}

function getError($error) {
	$_SESSION["error"] = $error;
	header("location:index.php");
}