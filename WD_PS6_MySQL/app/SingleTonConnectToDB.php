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

    private function __construct()
    {
        $config = require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR
            . 'configMysql.php';
        $dsn = 'mysql:host=' . $config['db_Host'] . ';dbname=' . $config['db_Name'] . ';charset=' . $config['charset'];
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];

        try {
            $conn = new \PDO($dsn, $config['db_User'], $config['db_Password'], $options);
        } catch (\PDOException $e) {
            die('Database Connection failed: ' . $e->getMessage());
        }
        $this->conn = $conn;
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