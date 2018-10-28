<?php
/*if ($_SERVER['REQUEST_METHOD'] !== 'POST' ) {
    header("location:index.php"); 
}*/

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$config = require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';

require_once $config['dataBase'];

var_dump($config['dataBase']);