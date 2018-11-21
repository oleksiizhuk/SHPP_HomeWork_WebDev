<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 19.11.2018
 * Time: 10:24
 */

class createDB
{
    private $localHost;
    private $root;
    private $password;
    private $dbNmae;

    public function __construct($localhost, $root, $passwordDB, $dbName)
    {
        $this->localHost = $localhost;
        $this->root = $root;
        $this->password = $passwordDB;
        $this->dbNmae = $dbName;
        try {
            $this->connectToDb();
            $this->createTablseUser();
        } catch (Exception $exaption) {
        getErr::getError($exaption);
    }

    }

    private function connectToDb()
    {
        $this->link = mysqli_connect($this->localhost, $this->root, $this->password, $this->dbName);
        if (mysqli_connect_errno()) {
            return;
            throw new Exception('ошибка подключению к базе данных
             (' . mysqli_connect_errno() . '): ' . mysqli_connect_error());
        }
    }

    private function createTablseUser()
    {
        $sql = "CREATE TABLE `chat`.`Users` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `login` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `password` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , PRIMARY KEY (`id`, `login`)) ENGINE = InnoDB";
        if (mysqli_query($sql)) {
            echo "Создание таблицы завершено";
        } else {
            echo "Таблицу создать не удалось";
        }
    }

    private function createTableMessage()
    {

        $sql = "CREATE TABLE 'Messages'  ('UserID'  VARCHAR(5) CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci NOT NULL " . " 'Name'  VARCHAR(25) CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci, " . " 'E-mail'  VARCHAR(25) CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci)";
        if (mysqli_query($sql)) {
            echo "Создание таблицы завершено";
        } else {
            echo "Таблицу создать не удалось";
        }

    }


}