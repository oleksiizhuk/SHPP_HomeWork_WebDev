<?php

namespace App;

class HandlerMessage
{
    private $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function addMessage($message)
    {
        $sql = 'INSERT INTO message (id, user, message, date) VALUES (NULL, :login, :message, :dateToSecond)';
        $sth = $this->connect->prepare($sql);

        $login = $_SESSION['login'];
        $dateToSecond = $this->timeMutatorToString();
        $message = htmlspecialchars($message, ENT_QUOTES);

        $params = [
            ':login' => $login,
            ':message' => $message,
            ':dateToSecond' => $dateToSecond
        ];
        $sth->execute($params);
    }

    public function checkNewMessage($lastId)
    {
        $sql = 'SELECT * FROM message WHERE date > UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 1 HOUR)) AND id > :lastId';

        $params = [
            ':lastId' => $lastId,
        ];
        $sth = $this->connect->prepare($sql);

        $sth->execute($params);

        $numResults = $sth->fetchAll();

        if (!$numResults) {
            http_response_code(202);
            die();
        }
        $arr = array();

        foreach ($numResults as $value) {
            $value['date'] = date('H:i:s', $value['date']);
            $arr[] = $value;
        }
        print_r(json_encode($arr));
    }

    private function timeMutatorToString()
    {
        return strtotime(date("Y-m-d H:i:s"));
    }
}
