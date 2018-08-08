<?php

	/**
	 * 
	 */
	class DataBase
	{
		


		public function ajaxJson() {
			$jsonData = $this->getJson();
			echo $jsonData;
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
		public function checkJson() { // не работает
			$result = $this->getJson(); 
			return ( json_last_error() === JSON_ERROR_NONE ) ;
		}

		private function getJson () {
			$urlJson = __DIR__ . DIRECTORY_SEPARATOR . 'json' . DIRECTORY_SEPARATOR . 'index.json';
			$jsonData = file_get_contents($urlJson);
			return $jsonData;
		}

	}