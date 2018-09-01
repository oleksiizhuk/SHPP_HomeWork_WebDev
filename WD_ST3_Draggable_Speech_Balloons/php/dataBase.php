<?php
	
	if (isset($_POST['jsonData'])) {
		echo "получилось";
		return;
	}

	function getJson() {
		$urlJson = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'json' . DIRECTORY_SEPARATOR . 'index.json';
		$jsonData = file_get_contents($urlJson);

	}
	function putJson() {
		$urlJson = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'json' . DIRECTORY_SEPARATOR . 'index.json';
		$jsonData = file_get_contents($urlJson);
	}
	function removeFromJson() {
		$urlJson = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'json' . DIRECTORY_SEPARATOR . 'index.json';
		$jsonData = file_get_contents($urlJson);
	}