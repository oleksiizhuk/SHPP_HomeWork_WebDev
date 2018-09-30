<?php
session_start();
$config = require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';
require $config['UserCheck'];
$_SESSION['user'] = 'admin';

$manager = new Manager;


if ($manager->checkAjax()) {
	require $config['AddMsgToJson'];
	$userCheck = new AddMsgToJson($config['AddMsgToJson']);
	$message = $_POST['addNewMsg'];
	$time = date("H:i:s");
	$dateToSecond = strtotime(date("Y-m-d H:i:s"));
	if ($userCheck->checkJsonUrl()) {
		$userCheck->addNewMsg($dateToSecond, $message);
		echo $time.','.$_SESSION['user'];
		return;
	} else {
		echo "err";
		return;
	}
}

if ($manager->checkAjaxGetMsg()) { // 
	require $config['UnloadFromJson'];
	$UnloadMsg = new UnloadFromJson($config['UnloadFromJson']);

	if (!$UnloadMsg->checkJsonUrl()) {
		echo "not file";
		return;
	}	
	$message = $UnloadMsg->unloadMessage();
	print_r( $message );
	return;
} 

if(!$manager->checkIsset()) {
	$_SESSION['er'] = "404";
	header("Location:index.php");
}

$result = $manager->checkEmpty($_POST['login'], $_POST['password']);

if (true === $result) {
	//echo "test ckecking";
} else {
	$_SESSION['er'] = $result;
	header("Location:index.php");
}

$userCheck = new UserCheck($config['UserCheck']);

if (!$userCheck->checkJsonUrl()) {
	$_SESSION['er'] = "404";
	header("Location:index.php");
}

if ($userCheck->checkUserPass($_POST['login'], $_POST['password'])) {
	$_SESSION['er'] = "не верный пароль";
	header("Location:index.php");
} else {
	$_SESSION['login'] = $_POST['login'];
	header("Location:chat.php");
}
return;

/**
 * 
 */
class Manager
{
	public function checkEmpty($login, $password) {
		if (empty($login)) {
			return "введите логин";
		}
		if (empty($password)) {
			return "введите пароль";
		}
		return true;
	}

	public function regular ($login) {
		$test = preg_match('%^[a-z0-9_-]{1,16}$%', $login);
		echo $test;
	}

	public function checkIsset() {
		return !isset($_POST['login']) && !isset($_POST['password']) ? false : true;
	}

	public function checkAjax() {
		return !isset($_POST['addNewMsg']) ? false : true;
	}
	public function checkAjaxGetMsg () {
		return !isset($_POST["getMsg"]) ? "false" : "true";
	}
}


