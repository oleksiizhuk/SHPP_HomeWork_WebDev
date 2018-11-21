<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 19.11.2018
 * Time: 13:33
 */

//$config = require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'configDataBase.php';

class SingleTonConnectToDB
{
    // Hold the class instance.
    private static $instance = null;
    private $conn;

    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $name = 'chat';

    // The db connection is established in the private constructor.
    //private function __construct()
    //{
    //    $this->conn = new PDO("mysql:host={$this->host};
    // dbname={$this->name}", $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    // }

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