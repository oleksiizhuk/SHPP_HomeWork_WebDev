<?php
/**
 * Created by PhpStorm.
 * User: Oleks
 * Date: 30.01.2019
 * Time: 18:50
 */

namespace app;

use core\Database;

class WeatherDB
{
    private $connection;

    public function __construct()
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
        $this->connection = $conn;
    }

    public function getValueWeather($argument)
    {
        /*if ($argument == 'forecast') {
            $sql = 'SELECT * FROM forecast';
        }
        if ($argument == 'cities') {
            $sql = 'SELECT * FROM cities';
        }*/
        $sql = 'SELECT * FROM cities,forecast';

        $sth = $this->connection->prepare($sql);
        $sth->execute();

        $numResults = $sth->fetchAll();

        echo(json_encode($numResults));
    }
}

//$arg = 'forecast';
//$arg = 'cities';