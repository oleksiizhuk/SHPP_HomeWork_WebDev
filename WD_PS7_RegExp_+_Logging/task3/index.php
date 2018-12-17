<?php
session_start();
$_SESSION["user_id"] = "1";

var_dump($_SERVER['REMOTE_ADDR']);

if (isset($_SESSION['user_id'])) {
    echo $_SESSION['user_id'];
}
require_once './app/classes/logging.php';


\App\classes\Logging::setRootLogDir('./log');

try {
    $log = new \App\classes\Logging('log/logs.json');
} catch (Exception $e) {
    echo 'Поймано исключение: ', $e->getMessage();
}

$IP = $_SERVER['REMOTE_ADDR'];
$text = array("ip" => "null", "user" => "lesha", "message" => "msg", "time" => date('Y-m-d H:i:s'), "id" => "1");

//$log->log($text);