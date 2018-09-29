<?php
/**
 * check url json and unload msg with json.
 */
class UnloadFromJson
{
	private $urlJson = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'json_database' . DIRECTORY_SEPARATOR . 'message.json';

	public function checkJsonUrl()	{
        return (file_exists($this->urlJson));
    }

    public function unloadMessage()	{
		$jsonData = file_get_contents($this->urlJson);
		$json = json_decode($jsonData, true);
		$timeToStr = time("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")));
		$count = 0;
		foreach ($json as $key => $value) {
			$count++;
			$filterToTime = $timeToStr - $value['time'];
			if ($filterToTime < 3600) {
				$newArray[$count]['user'] = $value['user'];
				$newArray[$count]['message'] = $value['message'];
				$newArray[$count]['time'] = date("H:i:s", $value['time']);
			}
		}
		$result = json_encode($newArray, JSON_PRETTY_PRINT);
		return $result;
	}
}