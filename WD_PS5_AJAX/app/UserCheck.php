<?php

/**
* 
*/
class UserCheck
{
	public $User;

	private $urlJson = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'json_database' . DIRECTORY_SEPARATOR . 'users.json';


    public function checkEmpty($login, $password) {
        if (empty($login)) {
            return "введите логин";
        }
        if (empty($password)) {
            return "введите пароль";
        }
        return true;
    }

	public function checkUserPass($login, $password) {
		$jsonData = file_get_contents($this->urlJson);
		$json = json_decode($jsonData, true);
		foreach ($json as $key => $value) {
			if ($value['user'] == $login) {
				if ($value['password'] == $password) {
					return true;
				} else {
					return;
				}
			} 
		}
        $this->user = $login;
		$this->createNewUser($login, $password);
	}

	 public function checkJsonUrl()	{
        return (file_exists($this->urlJson));
    }

    public function createNewUser($login, $password) {
    	$jsonData = file_get_contents($this->urlJson);
    	$json = json_decode($jsonData, true);
    	$user = array(
    		"user" => $login,
    		"password" => $password
    	);
    	$json[] = $user;
    	$result = json_encode($json, JSON_PRETTY_PRINT);

    	if(file_put_contents($this->urlJson, $result)) {
    		//echo "create new user";
    	}
    		
    }
}

