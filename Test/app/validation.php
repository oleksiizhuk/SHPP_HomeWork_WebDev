<?php
/**
 * Created by PhpStorm.
 * User: Oleks
 * Date: 17.12.2018
 * Time: 21:38
 */

namespace app;

class validation
{
    private $product;
    private $name;
    private $price;
    private $image;

    public function __construct($product, $name, $price, $image)
    {
        $this->product = $product;
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;

    }

    public function valieEditItem()
    {
        $this->checkProductAndName();
        $this->checkPrice();
        return $this->image ? $this->checkFile() : 0;
    }

    public function valid()
    {
        $this->checkProductAndName();
        $this->checkPrice();
        return $this->checkFile();
    }

    private function checkProductAndName()
    {
        if (empty($this->name)) {
            throw new \Exception("пустой name");
        }
        if (empty($this->product)) {
            throw new \Exception("пустой product");
        }
        $allowed = array('футболка', 'джинсы', 'брюки');
        if (!in_array($this->product, $allowed)) {
            throw new \Exception("такой категории не существует");
        }
    }

    private function checkPrice()
    {
        if (empty($this->price)) {
            throw new \Exception("пустой price");
        }
        if (!intval($this->price)) {
            throw new \Exception("не верная сумма");
        }
    }

    private function checkFile()
    {
        if (empty($this->image)) {
            throw new \Exception("пустой image");
        }
        $file = $this->image;
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];

        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));

        $allowed = array('jpg', 'png');

        if (in_array($file_ext, $allowed)) {
            if ($file_error !== 0) {
                throw new \Exception("ошибка image");
            }
            $file_name_new = uniqid('', true) . '.' . $file_ext;
            $file_destination = 'img/' . $file_name_new;

            move_uploaded_file($file_tmp, $file_destination);

            return $file_destination;
        }
    }
}