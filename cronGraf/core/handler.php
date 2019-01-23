<?php

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest'){
    header('location: ../public/index.php');
    die();
}

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'autoloader.php';

if (isset($_GET['function'])){
    if ($_GET['function'] === 'loadData'){
        $getData = new app\HandlDB();
        $getData->getLastContent();
    }
}

//use app\HandlDB;
//
//require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'autoloader.php';
//
//$instance = App\SingleTonConnectToDB::getInstance();
//$connect = $instance->getConnection();
//
//$db = new HandlDB($connect);
//
//
//
//if (isset($_POST['getLastContent'])){
//    if($_POST['getLastContent'] === 'getLastContent'){
//        $db->getLastContent();
//    }
//    exit();
//}
//
//if (isset($_POST['function'])) {
//    if ($_POST['function'] === 'getContent') {
//        $db->getContent($_POST['value'], $_POST['time']);
//        exit();
//    }
//
//}
//
//
//exit();
//if (isset($_POST['get'])) {
//
//}
