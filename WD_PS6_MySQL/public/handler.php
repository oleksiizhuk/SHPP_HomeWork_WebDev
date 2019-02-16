<?php /** @noinspection PhpIncludeInspection */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location:index.php");
    die();
}
session_start();

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'autoloader.php';

$instance = App\SingleTonConnectToDB::getInstance();
$conn = $instance->getConnection();


if (isset($_POST['submit'])) {
    $verification = new App\Verification($_POST['login'], $_POST['password'], $conn);
    try {
        $verification->verification();
        $_SESSION['login'] = $_POST['login'];
        header('Location: chat.php');
    } catch (Exception $exception) {
        App\GetErrorMessage::getError($exception->getMessage());
    }
    exit();
}

if (isset($_POST['addNewMsg'])) {
    try {
        App\GetErrorMessage::checkSession();
        $handlerMessage = new App\HandlerMessage($conn);
        $handlerMessage->addMessage($_POST['addNewMsg']);
    } catch (Exception $exception) {
        App\GetErrorMessage::getJsResponse($exception->getMessage());
    }
    exit();
}

if (isset($_POST['checkNewMessage'])) {
    try {
        App\GetErrorMessage::checkSession();
    } catch (Exception $exception) {
        App\GetErrorMessage::getJsResponse($exception->getMessage());
        exit();
    }
    $handlerMessage = new App\HandlerMessage($conn);
    $handlerMessage->checkNewMessage($_POST['checkNewMessage']);
}

if (isset($_POST['logout'])) {
    unset($_SESSION['login']);
    header("location:index.php");
}


