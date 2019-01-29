<?php /** @noinspection PhpIncludeInspection */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location:index.php");
    die();
}
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('APP_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR);
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'autoloader.php';
$config = require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';
/*spl_autoload_register(function ($class) {
    $file = APP_PATH . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if (isset($file) && file_exists($file)) {
        require_once $file;
    }
});*/

$instance = App\classes\SingleTonConnectToDB::getInstance();
$conn = $instance->getConnection();

$log = new App\logs\logger($config['logs']);

if (isset($_POST['submit'])) {
    $verification = new App\classes\Verification($_POST['login'], $_POST['password'], $conn);
    try {
        $verification->verification();
        $_SESSION['login'] = $_POST['login'];
        $log->addLog('success', 'verification');
        header('Location: chat.php');
    } catch (Exception $exception) {
        $log->addLog('ERORR', $exception->getMessage());
        App\classes\GetErrorMessage::getError($exception->getMessage());
    }
    exit();
}

if (isset($_POST['addNewMsg'])) {
    try {
        App\classes\GetErrorMessage::checkSession();
        $handlerMessage = new App\classes\HandlerMessage($conn);
        $handlerMessage->addMessage($_POST['addNewMsg']);
        $log->addLog('success', 'addNewMsg: ' . $_POST['addNewMsg']);
    } catch (Exception $exception) {
        $log->addLog('ERORR', $exception->getMessage());
        App\classes\GetErrorMessage::getJsResponse($exception->getMessage());
        echo $exception->getMessage();
    }
    exit();
}

if (isset($_POST['checkNewMessage'])) {
    try {
        App\classes\GetErrorMessage::checkSession();
    } catch (Exception $exception) {
        App\classes\GetErrorMessage::getJsResponse($exception->getMessage());
        exit();
    }
    $handlerMessage = new App\classes\HandlerMessage($conn);
    $handlerMessage->checkNewMessage($_POST['checkNewMessage']);
}

if (isset($_POST['logout'])) {
    $log->addLog('success', 'logout');
    unset($_SESSION['login']);
    header("location:index.php");
}
