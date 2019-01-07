<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 19.11.2018
 * Time: 2:14
 */

namespace App;

class GetErrorMessage
{

    public static function getError($exception)
    {
        $_SESSION["error"] = $exception;
        header("location:index.php");
    }

    public static function checkSession()
    {
        if (!isset($_SESSION['login'])) {
            throw new \Exception('your session outdated');
        }
    }

    public static function getJsResponse($exception)
    {
        http_response_code(400);
        $_SESSION["error"] = $exception;
    }

}
