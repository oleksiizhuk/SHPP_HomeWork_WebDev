<?php
/**
 * check url json and unload msg with json.
 */
class UnloadFromJson // jsonHandler
{
	private $urlJson;
	private $dataBase;
	private $template;
	private $oneHour;
	public function __construct ($urlJson) {
		$this->urlJson = $urlJson;
		$this->oneHour = 3600;
		$this->template = [];
	}

	public function getMassage() {
		$this->checkJsonFile();
		return $this->unloadMessage();
	}
	public function addNewMessageToJson($data, $message) {
		$this->checkJsonFile();
		$this->addNewMsg($data, $message);
    }
    public function unloadNewMessage($maxId) {
    	$this->checkJsonFile();
    	return $this->testArray($maxId);
    }

    /**
     * @throw Incorrect db
     * @throw at An encoding/decoding error has occurred.
     * @return void
     * @throws Exception
     */
    public function checkJsonFile() {
		if (!file_exists($this->urlJson)) {
			$this->createNewJsonFile();
		}
		if (!is_file($this->urlJson) && !is_readable($this->urlJson) && !is_writable($this->urlJson)) {
			throw new Exception('Incorrect db');
		}	
		$this->dataBase = json_decode(file_get_contents($this->urlJson), true);
		if (!$this->dataBase && json_last_error()) {
			throw new Exception("at An encoding/decoding error has occurred.");
		}
	}
	private function createNewJsonFile() {
		$result = json_encode($this->template, JSON_PRETTY_PRINT);
		file_put_contents($this->urlJson, $result);
	}

    public function unloadMessage()	{
		$jsonData = file_get_contents($this->urlJson);
		$json = json_decode($jsonData, true);
		$timeToStr = time("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")));
		$count = 0;
		$newArray = array();
		foreach ($json as $key => $value) {
			$count++;
			$filterToTime = $timeToStr - $value['time'];
			if ($filterToTime < 3600) {
				$newArray[$count]['user'] = $value['user'];
				$newArray[$count]['message'] = $value['message'];
				$newArray[$count]['time'] = date("H:i:s", $value['time']);
			}
		}
		if (!empty($newArray)) {
			$result = json_encode($newArray, JSON_PRETTY_PRINT);
			return $result;
		}
		return false;
	}

	public function testArray($maxId) {
		$jsonData = file_get_contents($this->urlJson);
		$json = json_decode($jsonData, true);
		$timeToStr = time("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")));
		$arr = [];
		$result = [];
		for($i = 1, $k = count($json); $i < $k; $i++) {
			$filterToTime = $timeToStr - $json[$i]['time'];
			if ($filterToTime < 3600) { 
				$json[$i]['time'] = date("H:i:s", $json[$i]['time']); 
				$arr[] = $json[$i];
			}
		}
		if ($maxId > count($json)) {
			return;
		}
		for ($i = $maxId; $i < count($arr); $i++) { 
			$result[] = $arr[$i];
		}
		return $result;
	}

	public function addNewMsg($data, $message) {
		$jsonData = file_get_contents($this->urlJson);
		$json = json_decode($jsonData, true);
		$user = array(
    		"user" => $_SESSION['login'],
    		"message" => $message,
    		"time" => $data
    	);
    	$json[] = $user;
    	$result = json_encode($json, JSON_PRETTY_PRINT);

    	if(file_put_contents($this->urlJson, $result)) {
    	}
	}


}