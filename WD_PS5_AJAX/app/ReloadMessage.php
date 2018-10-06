<?php
	/**
	 * 
	 */
	class ReloadMessage
	{
		private $urlJson;
		function __construct($urlJson) {
			$this->urlJson = $urlJson;
		}

		public function checkJsonUrl() {
			 return (file_exists($this->urlJson));
		}

		public function unloadMessage($id) {
			$jsonData = file_get_contents($this->urlJson);
			$json = json_decode($jsonData, true);
			echo $json;
		}

	}