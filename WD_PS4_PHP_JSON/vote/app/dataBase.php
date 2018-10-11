<?php

class DataBase
{
    private $urlJson;
    private $jsonDB;
    private $valueVote;

    function __construct($urlJson, $valueVote) {
       $this->urlJson = $urlJson;
       $this->valueVote = $valueVote;
   }

    public function ajaxGetJson() {
        $jsonData = file_get_contents($this->urlJson);
        return $jsonData;
    }

    public function addVote($userChoice) {    
        $this->jsonDB = $this->loadJson();
        $this->jsonDB[$userChoice]++;
        $result = json_encode($this->jsonDB, JSON_PRETTY_PRINT);
        file_put_contents($this->urlJson, $result);
    }

private function loadJson() {
    $db;
    if (!$this->checkJsonUrl()) {
        $this->createNewJsonFile();
    }
    $db = json_decode(file_get_contents($this->urlJson), true);
    if (json_last_error() === JSON_ERROR_NONE) {
        return $db;
    } 
    throw new Exception("Error", 1);
}

    public function checkJsonUrl() {
        return (file_exists($this->urlJson));
    }

    public function createNewJsonFile() {
        $result = json_encode($this->$valueVote, JSON_PRETTY_PRINT);
        file_put_contents($this->urlJson, $result);
    }
public function isJsonValid() {
    $jsonData = file_get_contents($this->testUrlJson);
    $json = json_decode($jsonData);
    return json_last_error();
}

}
