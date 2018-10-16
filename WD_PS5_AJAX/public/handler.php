<?php
//use User\UserCheck;
session_start();

$config = require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';

if (isset($_POST['test'])) {
	require $config['ReloadMessage'];
	$reloadMessage = new ReloadMessage($config['userJson']);
	$id = 2;
	$result = $reloadMessage->unloadMessage($id);
	echo $result;
}

if (isset($_POST['submit'])) {
	require $config['Verification'];
	$userCheck = new Verification($_POST['login'], $_POST['password'], $config['usersJson']);

	if (!$userCheck->checkEmptyAndRegularLoginAndPassword()) {
		header("Location:index.php");
		exit;
	}

	if (!$userCheck->checkJsonUrl()) {
		$_SESSION['error'] = "404";
		header("Location:errorPage.php");
		exit;
	}

	if (!$userCheck->verification()) {
		header("Location:index.php");
		exit;
	} else {
		$_SESSION['login'] = $_POST['login'];
		header("Location:chat.php");
		exit;
	}
}

if (isset($_POST['getMsg'])) {
	require $config['UnloadFromJson'];
	$UnloadMsg = new UnloadFromJson($config['messageJson']);

	if (!$UnloadMsg->checkJsonUrl()) {
		echo "not file";
		return;
	}
	$message = $UnloadMsg->unloadMessage();
	print_r( $message );
	return;
}

if (isset($_POST['addNewMsg'])) {
	require $config['AddMsgToJson'];
	$userCheck = new AddMsgToJson($config['messageJson']);

	$message = $_POST['addNewMsg'];
	$data = date("H:i:s");
	$dateToSecond = strtotime(date("Y-m-d H:i:s"));

	if ($userCheck->checkJsonUrl()) {
		$userCheck->addNewMsg($dateToSecond, $message);
		echo $data.','.$_SESSION['user'];
		return;  // потом удалить - 
	} else {
		echo "err - no file";
		return;  // потом удалить - 
	}
}

if (isset($_POST['updateMessage'])) {
	$count = $_POST['updateMessage'];
	require $config['UnloadFromJson'];
	$UnloadMsg = new UnloadFromJson($config['messageJson']);
	$message = $UnloadMsg->updateMessage($count);
	$result = array();
	//print_r(json_encode($message, JSON_PRETTY_PRINT));
	//return;
	//echo count($message)." - ".$count;


	if (count($message) > $count ) {
		for($i = $count + 1, $k = 0; $i < count($message); $i++, $k++) {
			$result[$k] = $message[$i + 1];
			/*$result[$k]['user'] = $message[$i]['user'];
			$result[$k]['message'] = $message[$i]['message'];
			$result[$k]['time'] = $message[$i]['time'];*/
		}
		print_r(json_encode($result, JSON_PRETTY_PRINT));
		return;
		if (!empty($result)) {
			print_r( json_encode($result, JSON_PRETTY_PRINT));
		} else {
			return;
		}
	}
	
}



