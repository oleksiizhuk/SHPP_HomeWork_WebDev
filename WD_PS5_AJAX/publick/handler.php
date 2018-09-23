<?php
session_start();
if(empty($_POST['password']) || empty($_POST['login'])) {
	$_SESSION['er'] = "не ввели логи или пароль";
	header('Location:index.php');
}

$config = require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';
require $config['database'];

$userCheck = new UserCheck($config['database']);

$login = $_POST['login'];
$password = $_POST['password'];
$msg = $userCheck->checkUserPass($login, $password);
echo $msg;
//print_r($config);

/*if (isset($_POST['password'])) {
	echo $_POST['password'];
}*/



