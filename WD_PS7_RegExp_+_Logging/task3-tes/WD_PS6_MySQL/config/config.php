<?php

/*define("APP_PATH", dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR);*/

define("LOGS_PATH", dirname(__DIR__) . DIRECTORY_SEPARATOR . 'log' . DIRECTORY_SEPARATOR);

return [

   /* 'HandlerMessage' => APP_PATH . 'HandlerMessage.php',

    'GetErrorMessage' => APP_PATH . 'GetErrorMessage.php',

    'Verification' => APP_PATH . 'Verification.php',

    'SingleTonConnectToDB' => APP_PATH . 'SingleTonConnectToDB.php',

    'Autoloader' => APP_PATH . 'Autoloader.php',*/

    'logs' => LOGS_PATH . 'logs.json'

];