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
        $dataBase = CheckJsonFile::check($this->urlJson);
		return $this->unloadMessage($dataBase);
	}
	public function addNewMessageToJson($data, $message) {
        $dataBase = CheckJsonFile::check($this->urlJson);
		$this->addNewMsg($data, $message,$dataBase);
    }
    public function unloadNewMessage($maxId) {
        $dataBase = CheckJsonFile::check($this->urlJson);
    	return $this->getLastMessage($maxId, $dataBase);
    }

    /**
     * @param $dataBase
     * @return bool|string
     */
    public function unloadMessage($dataBase) {
		$timeToStr = time("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")));
		$newArray = array();
        foreach ($dataBase as $key => $value) {
			$filterToTime = $timeToStr - $value['time'];
			if ($filterToTime < $this->oneHour) {
                $newArray['user'] = $value['user'];
                $newArray['message'] = $value['message'];
                $newArray['time'] = date("H:i:s", $value['time']);
			}
		}
		if (!empty($newArray)) {
			$result = json_encode($newArray, JSON_PRETTY_PRINT);
			return $result;
		}
		return false;
	}

	public function getLastMessage($maxId, $dataBase) {
        if ($maxId > count($dataBase)) {
            return false;   // return;
        }
		$timeToStr = time("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")));
		$arr = [];
		for($i = 1, $k = count($dataBase); $i < $k; $i++) {
			$filterToTime = $timeToStr - $dataBase[$i]['time'];
			if ($filterToTime < $this->oneHour) {
                $dataBase[$i]['time'] = date("H:i:s", $dataBase[$i]['time']);
				$arr[] = $dataBase[$i];
			}
		}
		$result = [];
		for ($i = $maxId; $i < count($arr); $i++) { 
			$result[] = $arr[$i];
		}
		return $result;
	}

    public function addNewMsg($data, $message, $dataBase) {
        $message = htmlspecialchars($message,ENT_QUOTES);
		$newMessage = array(
    		"user" => $_SESSION['login'],
    		"message" => $message,
    		"time" => $data
    	);
        $dataBase[] = $newMessage;
    	$result = json_encode($dataBase, JSON_PRETTY_PRINT);
        file_put_contents($this->urlJson, $result);
        return $newMessage;
	}

}