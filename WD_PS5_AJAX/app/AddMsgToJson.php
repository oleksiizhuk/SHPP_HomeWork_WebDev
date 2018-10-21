<?php

/**
 * check url Json and add msg to json 
 */
class AddMsgToJson
{
    private $urlJson;

    public function __construct ($urlJson) {
        $this->urlJson = $urlJson;
    }

	 public function checkJsonUrl()	{
        return (file_exists($this->urlJson));
    }

	public function addNewMsg($data, $message)
	{
		$jsonData = file_get_contents($this->urlJson);
		$json = json_decode($jsonData, true);
		$user = array(
    		"user" => $_SESSION['user'],
    		"message" => $message,
    		"time" => $data
    	);
    	$json[] = $user;
    	$result = json_encode($json, JSON_PRETTY_PRINT);

    	if(file_put_contents($this->urlJson, $result)) {
    	}
	}
}