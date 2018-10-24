<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST' ) {
    header("location:index.php"); 
}
$config = require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';

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
    require_once $config['UnloadFromJson'];
	$UnloadMsg = new UnloadFromJson($config['messageJson']);
	try{
		$message = $UnloadMsg->getMassage();
		print_r($message);
	} catch(Exception $exception) {
		getError($exception->getMessage());
	}
}

if (isset($_POST['addNewMsg'])) {
	require_once $config['UnloadFromJson'];
	$userCheck = new UnloadFromJson($config['messageJson']);
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
	require_once $config['UnloadFromJson'];
	$UnloadMsg = new UnloadFromJson($config['messageJson']);

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