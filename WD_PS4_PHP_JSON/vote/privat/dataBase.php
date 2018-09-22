<?php
class DataBase
{
    /**
     *this class check json url,add vote in json file and get errMsg
     */
    private $urlJson = __DIR__ . DIRECTORY_SEPARATOR . 'json' . DIRECTORY_SEPARATOR . 'index.json';

    public function ajaxGetJson() {
        $jsonData = $this->getJson();
        echo $jsonData;
    }

    public function addVote($userChoice) {
        $jsonData = file_get_contents($this->urlJson);
        $json = json_decode($jsonData, true);
        $json[0][$userChoice] += 1;
        $result = json_encode($json, JSON_PRETTY_PRINT);
        file_put_contents($this->urlJson, $result);
    }

    private function getJson() {
        $jsonData = file_get_contents($this->urlJson);
        return $jsonData;
    }

    public function checkJsonUrl() {
        return (file_exists($this->urlJson));
    }

    public function getError() {
        return "error - Файл не существует";
    }
}
