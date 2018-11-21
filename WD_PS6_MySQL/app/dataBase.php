<?php

class DataBase
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
            throw new Exception("Wrong password");
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

    public function addMessage($message)
    {
        if (!isset($_SESSION['user'])) {
            return;
        }
        $login = $_SESSION['user'];
        $dateToSecond = $this->timeMutatorToString();
        $message = htmlspecialchars($message, ENT_QUOTES);
        $sql = "INSERT INTO `message` (`id`, `user`, `message`, `date`) VALUES (NULL, '$login', '$message', '$dateToSecond')";

        if (!mysqli_query($this->link, $sql)) {
            throw new Exception('wrongPass');
        }
    }

    public function checkNewMessage($lastId)
    {
        $sql = "SELECT * FROM `message` WHERE `date` > UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 1 HOUR)) AND id > $lastId";

        $result = mysqli_query($this->link, $sql);

        $numResults = mysqli_num_rows($result);
        if ($numResults == 0) {
            http_response_code(202);
            die();
        }

        $arr = array();
        while ($message = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $message['date'] = date('H:i:s', $message['date']);
            $arr[] = $message;
        }

        print_r (json_encode($arr));
    }

    private function timeMutatorToString()
    {
        return strtotime(date("Y-m-d H:i:s"));
    }

}
