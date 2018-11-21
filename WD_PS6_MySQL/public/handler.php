<?php /** @noinspection PhpIncludeInspection */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location:index.php");
}
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('CONFIG_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR);
$config = require_once CONFIG_PATH . 'config.php';
$configDB = require_once CONFIG_PATH . 'configDataBase.php';



require_once $config['SingleTonConnectToDB'];

//отключить
require_once $config['getErr'];
require_once $config['dataBase'];

$instance = SingleTonConnectToDB::getInstance();
$conn = $instance->getConnection();


if (isset($_POST['submit'])) {
    require_once $config['Verification'];
    try {
        $verification = new Verification($_POST['login'], $_POST['password'], $conn);
        $verification->verification();
        $_SESSION['login'] = $_POST['login'];
        header('Location: chat.php');
    } catch (Exception $exception) {
        getError($exception->getMessage());
    }
}

if (isset($_POST['addNewMsg'])) {
    require_once $config['HandlerMessage'];
    $message = $_POST['addNewMsg'];
    try {
        $handlerMessage = new HandlerMessage($conn);
        $handlerMessage->addMessage($message);
    } catch (Exception $exception) {
        getError($exception);
    }
}

if (isset($_POST['checkNewMessage'])) {
    require_once $config['HandlerMessage'];
    $lastId = $_POST['checkNewMessage'];
    $handlerMessage = new HandlerMessage($conn);
    $handlerMessage->checkNewMessage($lastId);
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

/*
function __autoload($className)
{
    $classPeices = explode("\\", $className);
}*/
