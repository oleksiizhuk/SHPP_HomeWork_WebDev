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

    private $login;
    private $password;

    public function __construct ($login, $password) {
        $this->login = $login;
        $this->password = $password;
    }

    public function verification() {
        $this->checkEmptyAndRegularLoginAndPassword();
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


}