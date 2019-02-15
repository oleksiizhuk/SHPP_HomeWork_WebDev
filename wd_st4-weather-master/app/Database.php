<?php
/**
 * Created by PhpStorm.
 * User: Oleks
 * Date: 30.01.2019
 * Time: 18:50
 */

namespace app;

use core\WeatherInterface;

class Database implements WeatherInterface
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

    public function getValue()
    {
        $sql = 'SELECT * FROM cities, forecast';
        $sth = $this->connection->prepare($sql);
        $sth->execute();
        $numResults = $sth->fetchAll();
        if (!empty($numResults)) {
            $arr = [];
            foreach ($numResults as $key => $value) {
                $arr[$key]['date'] = $value['timestamp'];
                $arr[$key]['temperature'] = $value['temperature'];
                $arr[$key]['degree'] = "Celsius";
                $arr[$key]['icon'] = $this->convertIcon($value['clouds'], $value['rain_possibility']);
            }
            //echo(json_encode($numResults));
            echo(json_encode($arr));
        } else
            throw new \Exception("db is empty");
    }

    private function convertIcon($clouds, $rainPossibility)
    {
        if ($rainPossibility >= 0.8) {
            return 'rain';
        }
        if ($clouds > 15) {
            return 'sky-1';
        }
        return 'sun';
    }
}
