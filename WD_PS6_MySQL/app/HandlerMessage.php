<?php

class HandlerMessage
{
    private $connectToDataBase;

    function __construct($connectToDataBase)
    {
        $this->connectToDataBase = $connectToDataBase;
    }


    public function addMessage($message)
    {
        if (!isset($_SESSION['login'])) {
            return;
        }
        $login = $_SESSION['login'];
        $dateToSecond = $this->timeMutatorToString();
        $message = htmlspecialchars($message, ENT_QUOTES);
        $sql = "INSERT INTO `message` (`id`, `user`, `message`, `date`) VALUES (NULL, '$login', '$message', '$dateToSecond')";

        if (!mysqli_query($this->connectToDataBase, $sql)) {
            throw new Exception('wrongPass');
        }
    }

    public function checkNewMessage($lastId)
    {
        $sql = "SELECT * FROM `message` WHERE `date` > UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 1 HOUR)) AND id > $lastId";

        $result = mysqli_query($this->connectToDataBase, $sql);

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

        print_r(json_encode($arr));
    }

    private function timeMutatorToString()
    {
        return strtotime(date("Y-m-d H:i:s"));
    }
}