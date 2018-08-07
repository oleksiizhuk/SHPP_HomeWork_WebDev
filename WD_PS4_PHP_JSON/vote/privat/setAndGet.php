<?php

	/**
	 * 
	 */
	class DataBase
	{
		private $checkJson = false;
		//private $jsonData;

		public function checkJson() {
			$urlJson = __DIR__ . DIRECTORY_SEPARATOR . 'json' . DIRECTORY_SEPARATOR . 'index.json';
			$jsonData = file_get_contents($urlJson);
			echo $jsonData;
			//return $this->jsonData;
		}

		public function addVote($userChoice) {

			$urlJson = __DIR__ . DIRECTORY_SEPARATOR . 'json' . DIRECTORY_SEPARATOR . 'index.json';
			$jsonData = file_get_contents($urlJson);
			echo $jsonData;
			$json = json_decode($jsonData, true);
			$json["option".$userChoice]++;
			$json = json_encode($json);	
			file_put_contents('..'.DIRECTORY_SEPARATOR. 'privat'.DIRECTORY_SEPARATOR. 'json'. DIRECTORY_SEPARATOR . 'index.json', $json, JSON_PRETTY_PRINT);

		}

	}