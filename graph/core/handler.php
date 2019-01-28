<?php

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') {
    header('location: ../public/index.php');
    die();
}

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'autoloader.php';

use app\HandlDB;

if (isset($_GET['function'])) {
    if ($_GET['function'] === 'loadData') {
        $getData = new HandlDB();
        $getData->getLastContent();
        exit();
    }
}

if (isset($_POST['function'])) {
    if ($_POST['function'] === 'createGraph') {
        $createGraph = new HandlDB();
        $createGraph->getContent($_POST['value'], $_POST['time']);
        exit();
    }
}
