<?php

namespace app;
class CheckJsonFile
{
    private static $template = [];

    public static function check($urlJson)
    {
        if (!file_exists($urlJson)) {
            $result = json_encode(self::$template, JSON_PRETTY_PRINT);
            file_put_contents($urlJson, $result);
        }
        if (!is_file($urlJson) && !is_readable($urlJson) && !is_writable($urlJson)) {
            throw new Exception('Incorrect db');
        }
        $dataBase = json_decode(file_get_contents($urlJson), true);
        if (!$dataBase && json_last_error()) {
            throw new Exception("at An encoding/decoding error has occurred.");
        }
        return $dataBase;
    }
}
