<?php

define("APP_PATH", dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR);
define("JSON_PATH", dirname(__DIR__) . DIRECTORY_SEPARATOR . 'json_database' . DIRECTORY_SEPARATOR);

return [
    'Verification' => APP_PATH . 'Verification.php',

    'JsonHandler' => APP_PATH . 'JsonHandler.php',

    "CheckJsonFile" => APP_PATH . 'CheckJsonFile.PHP',

    'messageBase' => JSON_PATH . 'message.json',

    'usersJson' => JSON_PATH . 'users.json'
];
