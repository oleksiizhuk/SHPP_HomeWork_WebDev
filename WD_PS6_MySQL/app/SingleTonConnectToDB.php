<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 19.11.2018
 * Time: 13:33
 */

namespace App;

class SingleTonConnectToDB
{
    private static $instance = null;
    private $conn;

    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $name = 'chat';

    private function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->name);
        if (mysqli_connect_errno()) {
            throw new Exception('ошибка подключению к базе данных
             (' . mysqli_connect_errno() . '): ' . mysqli_connect_error());
        }

    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new SingleTonConnectToDB();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}