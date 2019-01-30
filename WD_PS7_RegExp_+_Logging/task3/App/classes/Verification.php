<?php

namespace app\classes;

class Verification
{
    const ERROR_MSG = ['emptyPass' => 'введите пароль', 'emptyLogin' => 'введите логин', 'wrongRegularLogin' => 'Длина имени пользователя должна быть от 1 до 16 символов', 'wrongRegularPass' => 'Длина пароля пользователя должна быть от 1 до 16 символов', 'wronngPass' => 'не верный пароль'];

    private $login;
    private $password;
    private $connect;

    public function __construct($login, $password, $connect)
    {
        $this->login = $login;
        $this->password = $password;
        $this->connect = $connect;
    }

    public function verification()
    {
        $this->deleteSpace();
        $this->checkIfEmpty();
        $this->checkRegular();
        $this->checkLoginAndPassword();
    }

    private function deleteSpace()
    {
        $this->login = trim($this->login);
        $this->password = trim($this->password);
    }

    private function checkIfEmpty()
    {
        if (empty($this->login)) {
            throw new \Exception(self::ERROR_MSG['emptyLogin']);
        }
        if (empty($this->password)) {
            throw new \Exception(self::ERROR_MSG['emptyPass']);
        }
    }

    private function checkRegular()
    {
        if (!preg_match('%^[a-zA-Z0-9_-]{1,16}$%', $this->login)) {
            throw new \Exception(self::ERROR_MSG['wrongRegularLogin']);
        }
        if (!preg_match('%^[a-zA-Z0-9_-]{1,32}$%', $this->password)) {
            throw new \Exception(self::ERROR_MSG['wrongRegularPass']);
        }
    }

    private function checkLoginAndPassword()
    {

        $sql = 'SELECT * FROM user WHERE name = :login';

        $sth = $this->connect->prepare($sql);

        $params = [':login' => $this->login];

        $sth->execute($params);

        $result = $sth->fetchAll();

        if (empty($result)) {
            $this->createNewUser();
            return;
        }

        if (!password_verify($this->password, $result[0]['password'])) {
            throw new \Exception("Wrong password");
        }
    }

    private function createNewUser()
    {

        $hashPass = password_hash($this->password, PASSWORD_DEFAULT);

        $sql = 'INSERT INTO user (id, name, password) VALUES (NULL, :login, :hashPass)';

        $params = [
            ':login' => $this->login,
            ':hashPass' => $hashPass
        ];

        $sth = $this->connect->prepare($sql);

        $sth->execute($params);
    }
}


