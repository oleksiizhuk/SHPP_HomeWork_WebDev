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
		return;  // потом удалить - косталь
	} else {
		echo "err - no file";
		return;  // потом удалить - косталь
	}
}

if (isset($_POST['updateMessage'])) {
	require $config['UnloadFromJson'];
	$UnloadMsg = new UnloadFromJson($config['messageJson']);
	$message = $UnloadMsg->unloadMessage();
	print_r( $message );
}


/*$manager = new Manager;
$manager->checkAjaxGetMsg();

if ($manager->checkAjaxGetMsg()) { // 
	require $config['UnloadFromJson'];
	$UnloadMsg = new UnloadFromJson();

	if(!$UnloadMsg->checkJsonUrl()){
		echo "not file";
		return;
	}
	$message = $UnloadMsg->unloadMessage();
	print_r( $message );
	return;
} 

if ($manager->checkAjax()) {
	require $config['AddMsgToJson'];
	$userCheck = new AddMsgToJson($config['AddMsgToJson']);
	$message = $_POST['addNewMsg'];
	$data = date("H:i:s");
	$dateToSecond = strtotime(date("Y-m-d H:i:s"));
	if ($userCheck->checkJsonUrl()) {
		$userCheck->addNewMsg($dateToSecond, $message);
		echo $data.','.$_SESSION['user'];
		return;  // потом удалить - косталь
	} else {
		echo "err - no file";
		return;  // потом удалить - косталь
	}
}*/

/**
 * 
 */
class Manager
{
	public function checkAjax() {
		return !isset($_POST['addNewMsg']) ? false : true;
	}
	public function checkAjaxGetMsg () {
		return !isset($_POST["getMsg"]) ? "false" : "true";
	}
}


