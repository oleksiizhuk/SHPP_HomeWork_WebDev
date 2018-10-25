<?php /** @noinspection PhpUnhandledExceptionInspection */

class DataBase
{
	private $urlJson;
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
		$jsonDB = $this->loadJson();
		$jsonDB[$userChoice]++;
		$result = json_encode($jsonDB, JSON_PRETTY_PRINT);
		file_put_contents($this->urlJson, $result);
	}

	private function loadJson() {
		if (!file_exists($this->urlJson)) {
			$this->createNewJsonFile();
		}
		$db = json_decode(file_get_contents($this->urlJson), true);
		if (json_last_error() === JSON_ERROR_NONE) {
			return $db;
		} 
		throw new Exception("Error");
	}

	private function createNewJsonFile() {
		$result = json_encode($this->valueVote, JSON_PRETTY_PRINT);
		file_put_contents($this->urlJson, $result);
	}

}
