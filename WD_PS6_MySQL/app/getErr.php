<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 19.11.2018
 * Time: 2:14
 */

class getErr
{

    public static function getError($exeption)
    {
        $_SESSION["error"] = $exeption;
        header("location:index.php");
    }

}