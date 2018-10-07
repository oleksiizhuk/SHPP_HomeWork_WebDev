<?php
class DataBase
{
    public $urlJson = __DIR__ . DIRECTORY_SEPARATOR . 'json' . DIRECTORY_SEPARATOR . 'index.json';

    function __construct($urlJson) {
       $this->urlJson = $urlJson;
   }

   public function ajaxGetJson() {
    $jsonData = file_get_contents($this->urlJson);
    return $jsonData;
}

public function addVote($userChoice) {
    $jsonData = file_get_contents($this->urlJson);
    $json = json_decode($jsonData, true);
    $json[$userChoice]++;
    $result = json_encode($json, JSON_PRETTY_PRINT);
    file_put_contents($this->urlJson, $result);
}

public function checkJsonUrl() {
    return (file_exists($this->urlJson));
}

public function getError() {
    return "error - Файл не существует";
}

public function createJson($viriant) {
    $result = json_encode($viriant, JSON_PRETTY_PRINT);
    file_put_contents($this->urlJson, $result);
}
}
