<?php

namespace App;

class Verification
{
    const ERROR_MSG = ['emptyPass' => 'введите пароль', 'emptyLogin' => 'введите логин', 'wrongRegularLogin' => 'Длина имени пользователя должна быть от 1 до 16 символов', 'wrongRegularPass' => 'Длина пароля пользователя должна быть от 1 до 16 символов', 'wronngPass' => 'не верный пароль'];

    private $login;
    private $password;
    private $link;

    public function __construct($login, $password, $link)
    {
        $this->login = $login;
        $this->password = $password;
        $this->link = $link;
    }

    public function verification()
    {
        $this->checkIfEmpty();
        $this->checkRegular();
        $this->checkLoginAndPassword();
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
        $sql = "SELECT * FROM `user` WHERE name='$this->login'";

        $result = mysqli_query($this->link, $sql);
        if (!$result) {
            throw new \Exception("Error description: ");
        }

        $pass = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if (empty($pass)) {
            $this->createNewUser($this->login, $this->password);
            return;
        }

        if (!password_verify($this->password, $pass[0]['password'])) {
            throw new \Exception("Wrong password");
        }
    }

    private function createNewUser($login, $password)
    {
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `user` (`id`, `name`, `password`) VALUES (NULL, '$login', '$hashPass')";

        if (!mysqli_query($this->link, $sql)) {
            throw new \Exception('wrongPass');
        }
    }
}
