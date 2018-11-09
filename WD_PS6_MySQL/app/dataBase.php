<?php

class Dbh
{
    private $localhost;
    private $root;
    private $password;
    private $dbName;
    private $link;

    function __construct($localhost, $root, $password, $dbName)
    {
        $this->localhost = $localhost;
        $this->root = $root;
        $this->password = $password;
        $this->dbName = $dbName;
        $this->connectToDB();
    }


    public function connectToDB()
    {
        $this->link = mysqli_connect($this->localhost, $this->root, $this->password, $this->dbName);
        if (mysqli_connect_errno()) {
            return;
            throw new Exception('ошибка подключению к базе данных
             (' . mysqli_connect_errno() . '): ' . mysqli_connect_error());
        }
        echo "connect <br>";
    }


    public function checkLoginAndPassword($login, $password)
    {
        $sql = "SELECT * FROM `user` WHERE name='$login'";

        $result = mysqli_query($this->link, $sql);

        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if (empty($categories)) {
            $this->createNewUser($login, $password);
            return;
        }

        if ($categories[0]['password'] != $password) {
            throw new Exception('Wrong password');
        }

        foreach ($categories as $key => $mass) {
            foreach ($mass as $keys => $value) {
                echo $keys . " => " . $value . " <br>";
            }
        }
    }


    private function createNewUser($login, $password)
    {
        $sql = "INSERT INTO `user` (`id`, `name`, `password`) VALUES (NULL, '$login', '$password')";

        if (!mysqli_query($this->link, $sql)) {
            throw new Exception('wrongPass');
        }
        echo "add new user";

    }


}
