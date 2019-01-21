<?php

namespace App\logs;

class loggerTest
{

    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
        $this->checkValidPath();
    }

    private function checkValidPath()
    {
        if (!file_exists($this->filePath)) {
            throw new \Exception('invalid path file');
        }
    }

    private function preparationForRecording()
    {
        if (!is_file($this->filePath) && !is_readable($this->filePath) && !is_writable($this->filePath)) {
            throw new \Exception('Incorrect db');
        }
        $fileLogs = json_decode(file_get_contents($this->filePath), true);
        if (!$fileLogs && json_last_error()) {
            throw new \Exception("at An encoding/decoding error has occurred.");
        }
        return $fileLogs;
    }

    public function addLog($level, $info)
    {
        $date = date('Y-m-d H:i:s');

        if (!isset($_SESSION['login'])) {
            $user = "unknown";
        } else
            $user = $_SESSION['login'];

        $message = array(
            "date" => $date,
            "level" => $level,
            "info" => $info,
            "user" => $user,
            "ip" => $_SERVER['REMOTE_ADDR']
        );
        $fileLogs = $this->preparationForRecording();

        $fileLogs[] = $message;
        $result = json_encode($fileLogs, JSON_PRETTY_PRINT);
        file_put_contents($this->filePath, $result);
    }

    public function setLog()
    {
        $fileLogs = $this->preparationForRecording();
        return $fileLogs;
    }
}