<?php
/**
 * check url json and unload msg with json.
 */
class UnloadFromJson // jsonHandler
{
	private $urlJson;

	public function __construct ($urlJson) {
		$this->urlJson = $urlJson;
	}

	public function checkJsonUrl()	{
        return (file_exists($this->urlJson));
    }

    public function unloadMessage()	{
		$jsonData = file_get_contents($this->urlJson);
		$json = json_decode($jsonData, true);
		$timeToStr = time("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")));
		$count = 0;
		$newArray;
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

	public function updateMessage()	{
		$jsonData = file_get_contents($this->urlJson);
		$json = json_decode($jsonData, true);
		$timeToStr = time("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")));
		$count = 0;
		$newArray;
		foreach ($json as $key => $value) {
			$filterToTime = $timeToStr - $value['time'];
			if ($filterToTime < 3600) {
				$count++;
				$newArray[$count]['user'] = $value['user'];
				$newArray[$count]['message'] = $value['message'];
				$newArray[$count]['time'] = date("H:i:s", $value['time']);
			}
		}
		if (!empty($newArray)) {
			return $newArray;
		} 
		return false;
	}


}