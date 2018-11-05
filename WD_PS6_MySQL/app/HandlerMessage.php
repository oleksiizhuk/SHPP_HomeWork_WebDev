<?php

class HandlerMessage
{
    function __construct()
    {

    }


    public function addToMsql($login, $password, $date)
    {

        $query = "INSERT INTO users (id, login, password, reg_date) VALUES ('NULL', '$login', '$password', '$date')";
    }

    public function deleteOfMysql()
    {

    }

    public function getOfMysql()
    {
        $search = mysqli_query("SELECT chat FROM login");
        while ($row = mysqli_fetch_array($search)) {
            echo '<p>Запись id=' . $row['id'] . '. Текст: ' . $row['login'] . '</p>';
        }
    }
}