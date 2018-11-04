<?php
class Verification
{
   const ERROR_MSG = [
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
        $dataBase = CheckJsonFile::check($this->urlJson);
		$this->checkIfEmpty();
		$this->checkRegular();
		$this->checkLoginAndPassword($dataBase);
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

	private function checkLoginAndPassword($dataBase) {
		foreach ($dataBase as $key => $value) {
			if ($value['user'] == $this->login) {
				if ($value['password'] == $this->password) {
					return;
				} else {
					throw new Exception(self::ERROR_MSG['wronngPass']);
				}
			} 
		}
		$this->createNewUser($dataBase);
	}

    private function createNewUser($dataBase) {
		$_SESSION['login'] = $this->login;
		$user = array(
			"user" => $this->login,
			"password" => $this->password
		);
        $dataBase[] = $user;
		$result = json_encode($dataBase, JSON_PRETTY_PRINT);
		if (file_put_contents($this->urlJson, $result)) {
		}
	}
}