<?php

namespace App\classes;
class Logging
{
    private static $rootPathDir;
    private $pathLog;
    private static $template = [];

    public function __construct(string $path_value)
    {
        if (empty(self::$rootPathDir)) {
            throw new \Exception(('must set root log dir'));
        }
        $path_value = $this->getValidPath($path_value);
        $this->pathLog = self::$rootPathDir . '/' . $path_value;
        if (!file_exists($this->pathLog)) {
            $explodePath = explode("/", $path_value);
            $fileName = $explodePath[count($explodePath) - 1];
            $pathToFile = str_replace($fileName, "", $this->pathLog);
            mkdir($pathToFile, 0777, true);
            $result = json_encode(self::$template, JSON_PRETTY_PRINT);
            file_put_contents($this->pathLog, $result);
        }
        if (!is_file($this->pathLog) && !is_readable($this->pathLog) && !is_writable($this->pathLog)) {
            throw new \Exception('Incorrect db');
        }
        $dataBase = json_decode(file_get_contents($this->pathLog), true);
        if (!$dataBase && json_last_error()) {
            throw new \Exception("at An encoding/decoding error has occurred.");
        }
    }

    public static function setRootLogDir($root_path)
    {
        self::$rootPathDir = $root_path;
    }

    public function log($info, $exceptions = NULL)
    {
        $dataBase = json_decode(file_get_contents($this->pathLog), true);
        if (!isset($_SESSION['user_id'])) {
            $user_id = "null";
        } else
            $user_id = $_SESSION['user_id'];

        $message = array(
            "date" => date('Y-m-d H:i:s'),
            "user_id" => $user_id,
            "info" => $info,
            "ip" => "123",
            "exceptions" => $exceptions
        );
        $dataBase[] = $message;
        $result = json_encode($dataBase, JSON_PRETTY_PRINT);
        file_put_contents($this->pathLog, $result);
    }

    private function getValidPath($path_value): string
    {
        return $path = trim(str_replace('\\', DIRECTORY_SEPARATOR, $path_value), DIRECTORY_SEPARATOR);

    }

    /* private function logging()
     {
         $date = date('Y-m-d H:i:s');
         $user_id = $this->info['user_id'];
         $user_name = $this->info['user_name'];
         $event = $this->info['event'];
         $message = $this->info['message'];
     }*/
}