<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location:index.php");
}
session_start();

$config = require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';

define('APP_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR);
spl_autoload_register(function ($class) {
    $file = APP_PATH . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if (isset($file) && file_exists($file)) {
        require_once $file;
    }
});

if (isset($_POST['submit'])) {
    $verification = new app\Verification($_POST['login'], $_POST['password'], $config['usersJson']);
    try {
        $verification->verification();
        $_SESSION['login'] = $_POST['login'];
        header("location:chat.php");
    } catch (Exception $exception) {
        getError($exception->getMessage());
    }
    exit();
}

if (isset($_POST['addNewMsg'])) {
    $addMsg = new app\JsonHandler($config['message']);
    try {
        $addMsg->addNewMessageToJson($_POST['addNewMsg']);
    } catch (Exception $exception) {
        getError($exception->getMessage());
    }
    exit();
}

if (isset($_POST['checkNewMessage'])) {
    $UnloadMsg = new app\JsonHandler($config['message']);
    try {
        echo $UnloadMsg->unloadNewMessage($_POST['checkNewMessage']);
    } catch (Exception $exception) {
        getError($exception->getMessage());
    }
    exit();
}

if (isset($_POST['logout'])) {
    unset($_SESSION['login']);
    header("location:index.php");
}

function getError($error)
{
    $_SESSION["error"] = $error;
    header("location:index.php");
}
