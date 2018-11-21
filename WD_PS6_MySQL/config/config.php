<?php


define("APP_PATH", dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR);


return [
    'dataBase' => APP_PATH . 'dataBase.php',

    'HandlerMessage' => APP_PATH . 'HandlerMessage.php',

    'getErr' => APP_PATH . 'getErr.php',

    'Verification' => APP_PATH . 'Verification.php',

    'SingleTonConnectToDB' => APP_PATH . 'SingleTonConnectToDB.php'

];