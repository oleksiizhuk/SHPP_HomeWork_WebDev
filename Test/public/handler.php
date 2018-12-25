<?php /** @noinspection PhpIncludeInspection */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location:index.php");
}
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('CONFIG_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR);
$config = require_once CONFIG_PATH . 'config.php';

require_once $config['SingleTone'];
require_once $config['HandlerMySql'];
$instance = App\SingleTone::getInstance();
$conn = $instance->getConnection();
$handlerMysql = new app\HandlerMySq($conn);

if (isset($_POST['sub'])) {
    require_once $config['validation'];
    try {
        $validation = new app\validation($_POST['product'], $_POST['name'], $_POST['price'], $_FILES['file']);
        $pathImg = $validation->valid();
        $handlerMysql->setProduct($_POST['product'], $_POST['name'], $_POST['price'], $pathImg);
        $_SESSION["error"] = "товар добавлен нормально";
        header("location:index.php");
    } catch (Exception $exception) {
        $_SESSION["error"] = $exception->getMessage();
        echo $exception->getMessage();
        header("location:index.php");
    }
}

if (isset($_POST['subEdit'])) {
    require_once $config['validation'];
    try {
        $validation = new app\validation($_POST['product'], $_POST['name'], $_POST['price'], $_FILES['file']);
        $pathImg = $validation->valieEditItem();
        $handlerMysql->editProduct($_POST['id'], $_POST['product'], $_POST['name'], $_POST['price'], $pathImg);
        $_SESSION["error"] = "товар изменен нормально";
    } catch (Exception $exception) {
        $_SESSION["error"] = $exception->getMessage();
    }
    die('<script>window.close()</script>');
}

if (isset($_POST['sort'])) {
    if ($_POST['sort'] == 'Главная') {
        $handlerMysql->gelAllProduct();
    } else {
        $handlerMysql->getProduct($_POST['sort']);
    }
    die();
}

if (isset($_POST['getAllProduct'])) {
    $handlerMysql->gelAllProduct();
    die();
}

if (isset($_POST['getProduct'])) {
    $handlerMysql->getProduct($_POST['getProduct']);
    die();
}

if (isset($_POST['deleteItem'])) {
    try {
        $handlerMysql->deleteItemById($_POST['deleteItem']);
    } catch (Exception $exception) {
        $_SESSION["error"] = $exception->getMessage();
    }
}

if (isset($_POST['verification'])) {
    require_once $config['Verification'];
    $Verification = new app\Verification($conn, $_POST['login'], $_POST['password']);
    if ($_POST['verification'] == 'registration') {
        try {
            $Verification->registration();
            $_SESSION["user"] = $_POST['login'];
            header("location:Verification.php");
        } catch (Exception $exception) {
            $_SESSION["error"] = $exception->getMessage();
            header("location:Verification.php");
        }
    } else {
        try {
            $Verification->authorization();
            $_SESSION["user"] = $_POST['login'];
            header("location:Verification.php");
        } catch (Exception $exception) {
            $_SESSION["error"] = $exception->getMessage();
            header("location:Verification.php");
        }
    }
}

if (isset($_POST['logout'])) {
    unset($_SESSION['user']);
    header("location:index.php");
}

