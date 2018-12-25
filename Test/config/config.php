<?php

define("APP_PATH", dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR);

return [
    'SingleTone' => APP_PATH . 'SingleTone.php',
    'HandlerMySql' => APP_PATH . 'HandlerMySql.php',
    'validation' => APP_PATH . 'validation.php',
    'Verification' => APP_PATH . 'Verification.php'
];
