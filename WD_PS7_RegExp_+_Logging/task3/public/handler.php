<?php /** @noinspection PhpIncludeInspection */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location:index.php");
    die();
}
session_start();

use core\ConnectToDB;

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'autoloader.php';
$config = require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';

$instance = ConnectToDB::getInstance();
$conn = $instance->getConnection();

$log = new App\logs\logger($config['logs']);

if (isset($_POST['submit'])) {
    $verification = new app\classes\Verification($_POST['login'], $_POST['password'], $conn);
    try {
        $verification->verification();
        $_SESSION['login'] = $_POST['login'];
        $log->addLog('success', 'verification');
        header('Location: chat.php');
    } catch (Exception $exception) {
        $log->addLog('ERORR', $exception->getMessage());
        app\classes\GetErrorMessage::getError($exception->getMessage());
    }
    exit();
}

if (isset($_POST['addNewMsg'])) {
    try {
        app\classes\GetErrorMessage::checkSession();
        $handlerMessage = new app\classes\HandlerMessage($conn);
        $handlerMessage->addMessage($_POST['addNewMsg']);
        $log->addLog('success', 'addNewMsg: ' . $_POST['addNewMsg']);
    } catch (Exception $exception) {
        $log->addLog('ERORR', $exception->getMessage());
        app\classes\GetErrorMessage::getJsResponse($exception->getMessage());
        echo $exception->getMessage();
    }
    exit();
}

if (isset($_POST['checkNewMessage'])) {
    try {
        app\classes\GetErrorMessage::checkSession();
    } catch (Exception $exception) {
        app\classes\GetErrorMessage::getJsResponse($exception->getMessage());
        exit();
    }
    $handlerMessage = new app\classes\HandlerMessage($conn);
    $handlerMessage->checkNewMessage($_POST['checkNewMessage']);
}

if (isset($_POST['logout'])) {
    $log->addLog('success', 'logout');
    unset($_SESSION['login']);
    header("location:index.php");
}
