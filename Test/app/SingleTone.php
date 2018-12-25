<?php
/**
 * Created by PhpStorm.
 * User: Oleks
 * Date: 12.12.2018
 * Time: 15:36
 */

namespace app;


class SingleTone
{

    private $config;
    private static $instance = null;
    private $conn;

    private  function __construct()
    {
        $this->config = require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'mysqlConfig.php';

        $this->conn = mysqli_connect( $this->config['db_Host'], $this->config['db_User'], $this->config['db_Password'], $this->config['db_Name']);

        if (mysqli_connect_errno()) {
            throw new \Exception('ошибка подключению к базе данных
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
            self::$instance = new SingleTone();
        }
        return self::$instance;
    }
    public function getConnection()
    {
        return $this->conn;
    }
}