<?php

define("DIR", dirname(__DIR__) . DIRECTORY_SEPARATOR);

return[
	'Verification' => DIR . 'app' .DIRECTORY_SEPARATOR. 'Verification.php',
	
	'JsonHandler' => DIR . 'app' .DIRECTORY_SEPARATOR. 'JsonHandler.php',

	"CheckJsonFile" => DIR . 'app' . DIRECTORY_SEPARATOR . 'CheckJsonFile.PHP',
	
	'messageJson' => DIR . 'json_database' . DIRECTORY_SEPARATOR . 'message.json',

	'usersJson' => DIR . 'json_database' . DIRECTORY_SEPARATOR . 'users.json'
];