<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location:index.php");
    die();
}

define('APP_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR);
spl_autoload_register(function ($class) {
    $file = APP_PATH . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if (isset($file) && file_exists($file)) {
        require_once $file;
    }
});

$instance = App\SingleTonConnectToDB::getInstance();
$conn = $instance->getConnection();