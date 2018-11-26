<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 19.11.2018
 * Time: 10:24
 */

namespace App;

class CreateDB
{
    private $link;

    public function __construct($link)
    {
        $this->link = $link;
        try {
            $this->createTableUser();
            $this->createTableMessage();
        } catch (Exception $exception) {
            getErr::getError($exception);
        }

    }

    private function checkavAilabilityTable()
    {
        $sql = "SHOW TABLES FROM `chat` LIKE 'нужная_таблица'";

        $sql = "SELECT * FROM `user` WHERE name='$this->login'";
    }

    private function createTableUser()
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