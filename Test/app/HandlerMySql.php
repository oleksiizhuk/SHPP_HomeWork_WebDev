<?php
/**
 * Created by PhpStorm.
 * User: Oleks
 * Date: 12.12.2018
 * Time: 15:52
 */

namespace app;

class HandlerMySq
{
    private $connectToDataBase;

    public function __construct($conn)
    {
        $this->connectToDataBase = $conn;
    }

    public function getProduct($category)
    {
        $sql = "SELECT * FROM `data_created` WHERE `category` = '$category'";
        mysqli_set_charset($this->connectToDataBase, "utf8");
        $result = mysqli_query($this->connectToDataBase, $sql);

        $numResults = mysqli_num_rows($result);

        if ($numResults === 0) {
            http_response_code(404);
            die();
        }
        $arr = array();
        while ($message = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $arr[] = $message;
        }
        print_r(json_encode($arr));
    }

    public function gelAllProduct()
    {
        $sql = " SELECT * FROM `data_created` ";
        mysqli_set_charset($this->connectToDataBase, "utf8");
        $result = mysqli_query($this->connectToDataBase, $sql);
        $numResults = mysqli_num_rows($result);
        if ($numResults === 0) {
            http_response_code(404);
            die();
        }
        $arr = array();
        while ($message = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $arr[] = $message;
        }
        print_r(json_encode($arr));
    }

    public function setProduct($category, $name, $price, $pathImg)
    {
        $dateToSecond = strtotime(date("Y-m-d H:i:s"));
        mysqli_set_charset($this->connectToDataBase, "utf8");
        $sql = "INSERT INTO `data_created` (`id`, `category`, `name`, `price`, `img_src`, `date_created`) VALUES (NULL, '$category', '$name', '$price', '$pathImg', '$dateToSecond')";

        if (!mysqli_query($this->connectToDataBase, $sql)) {
            throw new \Exception(mysqli_error() . $sql);
        }

    }

    public function editProduct($id, $category, $name, $price, $pathImg)
    {
        mysqli_set_charset($this->connectToDataBase, "utf8");
        if ($pathImg) {
            $sql = "UPDATE `data_created` SET `category` = '$category', `name` = '$name', `price` = '$price', `img_src` = '$pathImg' WHERE `id` = '$id'";
        } else {
            $sql = "UPDATE `data_created` SET `category` = '$category', `name` = '$name', `price` = '$price' WHERE `id` = '$id'";
        }
        if (!mysqli_query($this->connectToDataBase, $sql)) {
            throw new \Exception(mysqli_error());
        }
    }

    public function deleteItemById($id)
    {
        if (empty($id)) {
            http_response_code(400);
            die();
        }
        $sql = "DELETE from `data_created` where `id`= '$id'";
        if (!mysqli_query($this->connectToDataBase, $sql)) {
            throw new \Exception(mysqli_error());
        }
        http_response_code(202);
    }

    private function timeMutatorToString()
    {
        return strtotime(date("Y-m-d H:i:s"));
    }
}