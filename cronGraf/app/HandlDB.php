<?php
/**
 * Created by PhpStorm.
 * User: Oleks
 * Date: 15.01.2019
 * Time: 22:01
 */

namespace App;


class HandlDB
{
    private $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }


}