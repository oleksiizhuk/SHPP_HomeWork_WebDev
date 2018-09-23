<?php
$database = 'database';
echo "test - $database";
/**
* 
*/
class UserCheck
{
	
	private $urlJson = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'json_database' . DIRECTORY_SEPARATOR . 'users.json';

	public function checkUserPass($login, $password)
	{
		$jsonData = file_get_contents($this->urlJson);
		$json = json_decode($jsonData, true);
		foreach ($json as $key => $value) {
			if ($value['user'] == $login) {
				if ($value['password'] == $password) {
					return 'good';
				} else {
					return "false password";
				}
			} else {
				return;
			}
		}
	}
}