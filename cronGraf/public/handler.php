<?php
/*if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location:index.php");
    die();
}*/

define('APP_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR);
spl_autoload_register(function ($class) {
    $file = APP_PATH . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if (isset($file) && file_exists($file)) {
        require_once $file;
    }
});

$instance = App\SingleTonConnectToDB::getInstance();
$connect = $instance->getConnection();

$db = new App\HandlDB($connect);


if (isset($_POST['addContent'])) {
    $db->addContent();
    exit();
}

if (isset($_POST['getLastContent'])){
    if($_POST['getLastContent'] === 'getLastContent'){
        $db->getLastContent();
    }
    exit();
}

if (isset($_POST['function'])) {
    if ($_POST['function'] === 'getContent') {
        $db->getContent($_POST['value'], $_POST['time']);
        exit();
    }

}


exit();
if (isset($_POST['get'])) {

}