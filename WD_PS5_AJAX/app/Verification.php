<?php
// namespace User;
/**
* 
*/
class Verification
{

  private const ERROR_MSG = [
	'wrongPassword' => 'введите пароль',
	'wrongLogin' => 'введите логин'
  ];

	private $urlJson;
	private $login;
	private $password;
	private $database; 
	private $template = [];

	public function __construct ($login, $password, $urlJson) {
		$this->login = $login;
		$this->password = $password;
		$this->urlJson = $urlJson;

	}

	public function checkJsonUrl() {
		if (!file_exists($this->urlJson)) {
			$this->createNewJsonFile();
		}
		if (!is_file($this->urlJson) && !is_readable($this->urlJson) && !is_writable($this->urlJson)) {
			throw new Exception('Incorrect db');
		}	
		$this->database = json_decode(file_get_contents($this->urlJson), true);
		if (!$this->database && json_last_error()) {
			throw new Exception("at An encoding/decoding error has occurred.");
		}
	}

	private function createNewJsonFile() {
		$result = json_encode($this->template, JSON_PRETTY_PRINT);
		file_put_contents($this->urlJson, $result);
	}

	public function checkEmptyAndRegularLoginAndPassword() {
		if (!$this->checkIfEmpty() || !$this->checkRegular()) {
			return false;
		}
		return true;
	}

	private function checkIfEmpty() {
		if (empty($this->login)) {
			$_SESSION['error'] = self::ERROR_MSG['wrongLogin'];
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

	public function verification() {
		$jsonData = file_get_contents($this->urlJson);
		$json = json_decode($jsonData, true);
		foreach ($json as $key => $value) {
			if ($value['user'] == $this->login) {
				if ($value['password'] == $this->password) {
					$_SESSION['user'] = $this->login;
					return true;
				} else {
					$_SESSION['error'] = "не верный пароль";
					return false;
				}
			} 
		}
		return $this->createNewUser();
	}

	public function createNewUser() {
		$_SESSION['user'] = $this->login;
		$jsonData = file_get_contents($this->urlJson);
		$json = json_decode($jsonData, true);
		$user = array(
			"user" => $this->login,
			"password" => $this->password
		);
		$json[] = $user;
		$result = json_encode($json, JSON_PRETTY_PRINT);

		if(file_put_contents($this->urlJson, $result)) {
			return true;
		}
	}

}
