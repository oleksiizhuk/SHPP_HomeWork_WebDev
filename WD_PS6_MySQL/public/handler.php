<?php /** @noinspection PhpIncludeInspection */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location:index.php");
}
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('CONFIG_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR);
$config = require_once CONFIG_PATH . 'config.php';

require_once $config['SingleTonConnectToDB'];
require_once $config['GetErrorMessage'];

$instance = App\SingleTonConnectToDB::getInstance();
$conn = $instance->getConnection();


if (isset($_POST['submit'])) {
    require_once $config['Verification'];
    $verification = new App\Verification($_POST['login'], $_POST['password'], $conn);
    try {
        $verification->verification();
        $_SESSION['login'] = $_POST['login'];
        header('Location: chat.php');
    } catch (Exception $exception) {
       GetErrorMessage::getError($exception->getMessage());
    }
    die();
}

if (isset($_POST['addNewMsg'])) {
    require_once $config['HandlerMessage'];
    try {
        GetErrorMessage::checkSession();
        $handlerMessage = new App\HandlerMessage($conn);
        $handlerMessage->addMessage($_POST['addNewMsg']);
    } catch (Exception $exception) {
        GetErrorMessage::getJsResponse($exception->getMessage());
    }
    die();
}

if (isset($_POST['checkNewMessage'])) {
    try {
        GetErrorMessage::checkSession();
    } catch (Exception $exception) {
        GetErrorMessage::getJsResponse($exception->getMessage());
        die();
    }
    require_once $config['HandlerMessage'];
    $handlerMessage = new  App\HandlerMessage($conn);
    $handlerMessage->checkNewMessage($_POST['checkNewMessage']);
}


if (isset($_POST['logout'])) {
    unset($_SESSION['login']);
    header("location:index.php");
}


