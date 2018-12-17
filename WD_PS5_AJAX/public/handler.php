<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location:index.php");
}
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$config = require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';
require_once $config['CheckJsonFile'];

if (isset($_POST['submit'])) {
    require_once $config['Verification'];
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
    require_once $config['JsonHandler'];
    $addMsg = new app\JsonHandler($config['messageBase']);
    try {
        $addMsg->addNewMessageToJson($_POST['addNewMsg']);
    } catch (Exception $exception) {
        getError($exception->getMessage());
    }
    exit();
}


if (isset($_POST['checkNewMessage'])) {
    require_once $config['JsonHandler'];
    $UnloadMsg = new app\JsonHandler($config['messageBase']);
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