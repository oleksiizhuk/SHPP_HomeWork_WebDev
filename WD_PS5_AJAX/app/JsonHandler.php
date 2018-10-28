<?php
/**
 * check url json and unload msg with json.
 */
class JsonHandler
{
	private $urlJson;
	private $oneHour;
	
	public function __construct ($urlJson) {
		$this->urlJson = $urlJson;
		$this->oneHour = 3600;
	}

	public function getMassage() {
		CheckJsonFile::check($this->urlJson);
		return $this->unloadMessage();
	}
	public function addNewMessageToJson($data, $message) {
		CheckJsonFile::check($this->urlJson);
		$this->addNewMsg($data, $message);
    }
    public function unloadNewMessage($maxId) {
    	CheckJsonFile::check($this->urlJson);
    	return $this->testArray($maxId);
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
			if ($filterToTime < $this->oneHour) {
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
		for($i = 1, $k = count($json); $i < $k; $i++) {
			$filterToTime = $timeToStr - $json[$i]['time'];
			if ($filterToTime < $this->oneHour) { 
				$json[$i]['time'] = date("H:i:s", $json[$i]['time']); 
				$arr[] = $json[$i];
			}
		}
		if ($maxId > count($json)) {
			return;
		}
		$result = [];
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