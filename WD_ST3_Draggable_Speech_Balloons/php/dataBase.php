<?php

if ( isset($_POST['objData1']) ) {
	$objData = $_POST['objData1'];
	echo $objData."<br>";
	putToJson($objData);
	return;
} else {
	echo "lol1";
	return;
}


function putToJson($objData) {
	$urlJson = __DIR__ . DIRECTORY_SEPARATOR . 
	'..' . DIRECTORY_SEPARATOR . 'json' .
	 DIRECTORY_SEPARATOR . 'index.json';

	$jsonData = file_get_contents($urlJson);
	$json = json_decode($jsonData, true);

	print_r($json);

	array_push($json, $objData);

	print_r($json);

	$json = json_encode($json);

	file_put_contents($urlJson, $json, JSON_PRETTY_PRINT);
}

function getJson() {
	$urlJson = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'json' . DIRECTORY_SEPARATOR . 'index.json';
	$jsonData = file_get_contents($urlJson);

}

function removeFromJson() {
	$urlJson = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'json' . DIRECTORY_SEPARATOR . 'index.json';
	$jsonData = file_get_contents($urlJson);
}


