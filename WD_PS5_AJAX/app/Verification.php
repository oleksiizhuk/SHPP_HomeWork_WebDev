<?php
class Verification
{
  private const ERROR_MSG = [
	'emptyPass' => 'введите пароль',
	'emptyLogin' => 'введите логин',
	'wrongRegularLoggin' => 'Длина имени пользователя должна быть от 1 до 16 символов',
	'wrongRegularPass' => 'Длина пароля пользователя должна быть от 1 до 16 символов',
	'wronngPass' => 'не верный пароль'
  ];

	private $urlJson;
	private $login;
	private $password;

	public function __construct ($login, $password, $urlJson) {
		$this->login = $login;
		$this->password = $password;
		$this->urlJson = $urlJson;
	}
	
	public function verification() {
		CheckJsonFile::check($this->urlJson);
		$this->checkEmptyAndRegularLoginAndPassword();
		$this->checkLoginAndPassword();
	}

	private function checkEmptyAndRegularLoginAndPassword() {
		$this->checkIfEmpty();
		$this->checkRegular();
	}

	private function checkIfEmpty() {
		if (empty($this->login)) {
			throw new Exception(self::ERROR_MSG['emptyLogin']);
		}
		if (empty($this->password)) {
			throw new Exception(self::ERROR_MSG['emptyPass']);
		}
	}

	private function checkRegular() {
		if (!preg_match('%^[a-zA-Z0-9_-]{1,16}$%', $this->login)) {
			throw new Exception(self::ERROR_MSG['wrongRegularLoggin']);
		}
		if (!preg_match('%^[a-zA-Z0-9_-]{1,16}$%', $this->password)) {
			throw new Exception(self::ERROR_MSG['wrongRegularPass']);
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
					throw new Exception(self::ERROR_MSG['wronngPass']);
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