<?php

class Verif extends DataBase
{
    const ERROR_MSG = ['emptyPass' => 'введите пароль', 'emptyLogin' => 'введите логин', 'wrongRegularLogin' => 'Длина имени пользователя должна быть от 1 до 16 символов', 'wrongRegularPass' => 'Длина пароля пользователя должна быть от 1 до 16 символов', 'wronngPass' => 'не верный пароль'];

    private $login;
    private $password;

    public function __construct($login, $pass, $localhost, $root, $passwordDB, $dbName)
    {
        $this->login = $login;
        $this->password = $pass;
        parent::__construct($localhost, $root, $passwordDB, $dbName);
    }

    public function verification()
    {
        $this->checkEmptyAndRegularLoginAndPassword();
    }

    private function checkEmptyAndRegularLoginAndPassword()
    {

        $this->checkIfEmpty();
        $this->checkRegular();
        parent::checkLoginAndPassword($this->login, $this->password);

    }

    private function checkIfEmpty()
    {
        if (empty($this->login)) {
            throw new Exception(self::ERROR_MSG['emptyLogin']);
        }
        if (empty($this->password)) {
            throw new Exception(self::ERROR_MSG['emptyPass']);
        }
    }

    private function checkRegular()
    {
        if (!preg_match('%^[a-zA-Z0-9_-]{1,16}$%', $this->login)) {
            throw new Exception(self::ERROR_MSG['wrongRegularLogin']);
        }
        if (!preg_match('%^[a-zA-Z0-9_-]{1,16}$%', $this->password)) {
            throw new Exception(self::ERROR_MSG['wrongRegularPass']);
        }
    }

}
