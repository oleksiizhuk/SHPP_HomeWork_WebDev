<?php
// namespace User;
/**
* 
*/
class UserCheck
{

  private const ERROR_MSG = [
  	'wrongPassword' => 'неверный пароль'
  ];

	private $userStatus = null;

	private $urlJson = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'json_database' . DIRECTORY_SEPARATOR . 'users.json';

	private $login;
	private $password;

	public function __construct ($login, $password) {
		$this->login = $login;
		$this->password = $password;
	}

	public function checkEmptyAndRegularLoginAndPassword() {
		if (!$this->checkIfEmpty() || !$this->checkRegular()) {
			return false;
		}
		return true;
	}

	private function checkIfEmpty() {
		if (empty($this->login)) {
			$_SESSION['error'] = "введите логин";
			return false;
		}
		if (empty($this->password)) {
			 $_SESSION['error'] = self::ERROR_MSG['wrongPassword'];
			 return false;
		}
		return true;
	}

	private function checkRegular() {
		if (!preg_match('%^[a-zA-Z0-9_-]{1,16}$%', $this->login)) {
			$_SESSION['error'] = "не прошла регулярка login";
			return false;
		}
		if (!preg_match('%^[a-zA-Z0-9_-]{1,16}$%', $this->password)) {
			$_SESSION['error'] = "не прошла регулярка password";
			return false;
		}
		return true;
	}

	public function verificationIsUser() {
		$jsonData = file_get_contents($this->urlJson);
		$json = json_decode($jsonData, true);
		foreach ($json as $key => $value) {
			if ($value['user'] == $this->login) {
				if ($value['password'] == $this->password) {
					return true;
				}
				$_SESSION['error'] = "не верный пароль";
					return false;
			} 
		}
		$this->createNewUser();
	}

	 public function checkJsonUrl()	{
		return (file_exists($this->urlJson));
	}

	public function createNewUser() {
		$_SESSION['user'] = $this->$login;
		$jsonData = file_get_contents($this->urlJson);
		$json = json_decode($jsonData, true);
		$user = array(
			"user" => $this->$login,
			"password" => $this->password
		);
		$json[] = $user;
		$result = json_encode($json, JSON_PRETTY_PRINT);

		if(file_put_contents($this->urlJson, $result)) {
			echo "create new user";
		}
			
	}
}
