<?php
/**
 * Created by PhpStorm.
 * User: Oleks
 * Date: 17.12.2018
 * Time: 1:19
 */

namespace app;


class Verification
{
    private $conn;
    private $login;
    private $password;


    public function __construct($conn, $login, $password)
    {
        $this->conn = $conn;
        $this->login = $login;
        $this->password = $password;
    }


    public function registration()
    {
        $this->checkEmpty();
        $this->checkRegular();
        $this->checkLoginPasswordRegistration();
        $this->createNewUser();
    }

    public function authorization()
    {
        $this->checkEmpty();
        $this->checkLoginPasswordAuthorization();
    }

    private function checkRegular()
    {
        if (!preg_match('%^[a-zA-Z0-9_-]{1,16}$%', $this->login)) {
            throw new \Exception('только цыфры и буквы от 1 до 16');
        }
    }

    private function checkEmpty()
    {
        if (empty($this->login)) {
            throw new \Exception('введите логин');
        }
        if (empty($this->password)) {
            throw new \Exception('введите пароль');
        }
    }

    private function checkLoginPasswordRegistration()
    {

        $sql = "SELECT * FROM `users` WHERE login='$this->login'";
        $result = mysqli_query($this->conn, $sql);
        $count = mysqli_num_rows($result);
        if ($count != 0) {
            throw new \Exception("логин занят ");
        }
    }

    public function checkLoginPasswordAuthorization()
    {
        $sql = "SELECT * FROM `users` WHERE login='$this->login'";
        $result = mysqli_query($this->conn, $sql);
        $count = mysqli_num_rows($result);
        if ($count == 0) {
            throw new \Exception("такого логина не существет ");
        }
        $pass = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if ($this->password != $pass[0]['password']) {
            throw new \Exception("неверный пароль ");
        }
    }

    private function createNewUser()
    {
        $login = htmlspecialchars($this->login, ENT_QUOTES);
        $sql = "INSERT INTO `users` (`id`, `login`, `password`) VALUES (NULL, '$login', '$this->password')";

        if (!mysqli_query($this->conn, $sql)) {
            throw new \Exception(mysqli_error());
        }

    }
}
