<?php
	class DataBase
	{
        /**
         *
         */
        public function ajaxGetJson() {
			$jsonData = $this->getJson();
			echo $jsonData;
		}

		public function addVote($userChoice) {
			$urlJson = __DIR__ . DIRECTORY_SEPARATOR . 'json' . DIRECTORY_SEPARATOR . 'index.json';
			$jsonData = file_get_contents($urlJson);
			$json = json_decode($jsonData, true);
			$json[0][$userChoice] += 1;
			$result = json_encode($json, JSON_PRETTY_PRINT);
			file_put_contents($urlJson, $result);
		}

		public function checkJson() { // не работает
			$result = $this->getJson();
			return ( json_last_error() === JSON_ERROR_NONE ) ;
		}

		private function getJson() {
			$urlJson = __DIR__ . DIRECTORY_SEPARATOR . 'json' . DIRECTORY_SEPARATOR . 'index.json';
			$jsonData = file_get_contents($urlJson);
			return $jsonData;
		}

		public function checkJsonUrl($urlJson){
            if (file_exists($filename)) {
                echo "Файл $filename существует";
            } else {
                echo "Файл $filename не существует";
            }
        }

		public function getError() {
			return "error";
		}

	}
