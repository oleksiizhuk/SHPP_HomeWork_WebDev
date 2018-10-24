<?php
// namespace User;

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
	
	public function verification() {
			$this->checkJsonFile();
			$this->checkEmptyAndRegularLoginAndPassword();
			$this->checkLoginAndPassword();
	}

	private function checkJsonFile() {
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

	private function checkEmptyAndRegularLoginAndPassword() {
		$this->checkIfEmpty();
		$this->checkRegular();
	}

	private function checkIfEmpty() {
		if (empty($this->login)) {
			throw new Exception(self::ERROR_MSG['wrongLogin']);
		}
		if (empty($this->password)) {
			throw new Exception(self::ERROR_MSG['wrongPassword']);
		}
	}

	private function checkRegular() {
		if (!preg_match('%^[a-zA-Z0-9_-]{1,16}$%', $this->login)) {
			throw new Exception("не прошла регулярка login");
		}
		if (!preg_match('%^[a-zA-Z0-9_-]{1,16}$%', $this->password)) {
			throw new Exception("не прошла регулярка password");
		}
	}

	private function checkLoginAndPassword() {
		$jsonData = file_get_contents($this->urlJson);
		$json = json_decode($jsonData, true);
		foreach ($json as $key => $value) {
			if ($value['user'] == $this->login) {
				if ($value['password'] == $this->password) {
					return;
				} else {
					throw new Exception("не верный пароль");
				}
			} 
		}
		$this->createNewUser();
	}

	private function createNewUser() {
		$_SESSION['user'] = $this->login;
		$jsonData = file_get_contents($this->urlJson);
		$json = json_decode($jsonData, true);
		$user = array(
			"user" => $this->login,
			"password" => $this->password
		);
		$json[] = $user;
		$result = json_encode($json, JSON_PRETTY_PRINT);
		if (file_put_contents($this->urlJson, $result)) {
		}
	}

}
