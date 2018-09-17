<?php
$urlJson = __DIR__ . DIRECTORY_SEPARATOR . 
	'..' . DIRECTORY_SEPARATOR . 'json' .
	 DIRECTORY_SEPARATOR . 'index.json';

if ( isset($_POST['objData1']) ) {
	$objData = $_POST['objData1'];
	putToJson($objData, $urlJson);
	return;
} 
if ( isset($_POST['getInfoAboutDraggableFromJson'])) {
	getInfoAboutDraggableFromJson($urlJson);
	return;
}

if ( isset($_POST['informationOnTheBlock'])) {
	$objInfo = $_POST['informationOnTheBlock'];
	replaceContent($urlJson, $objInfo);
	return;
}
if ( isset($_POST['removeIdElement'])) {
	$id = $_POST['removeIdElement'];
	removeFromJson($urlJson, $id);
	return;
}
if( isset($_POST['addNewСoordinationToJson'])) {
	$dataObj = $_POST['addNewСoordinationToJson'];
	addNewСoordinationToJson($urlJson, $dataObj);
}
else {
	echo "error";
	return;
}

function putToJson($objData, $urlJson) {
	$jsonData = file_get_contents($urlJson);
	$json = json_decode($jsonData);
	$objData = json_decode($objData, true);
	$json[] = $objData;
	$result = json_encode($json, JSON_PRETTY_PRINT);
	if(file_put_contents($urlJson, $result)) {
	        echo 'Data successfully saved';
	    }
}

function getInfoAboutDraggableFromJson($urlJson) {
		$jsonData = file_get_contents($urlJson);
		print_r($jsonData);
}

function replaceContent ($urlJson, $objInfo) {
	$jsonData = file_get_contents($urlJson);
	$json = json_decode($jsonData, true);
	$arr =  explode(',', $objInfo);
	foreach ($json as $key => $value) {
		if ($value['id'] === $arr[0]) {
			$json[$key]['content'] = $arr[1];
		}
	}
	$result = json_encode($json, JSON_PRETTY_PRINT);
	file_put_contents($urlJson, $result);
}

function removeFromJson($urlJson, $objId) {
	$jsonData = file_get_contents($urlJson);
	$json = json_decode($jsonData, true);
	foreach ($json as $key => $value) {
		if($value['id'] == $objId){
			$json[$key]['deleted'] = true;
		}
	}
	$result = json_encode($json, JSON_PRETTY_PRINT);
	file_put_contents($urlJson, $result);
}

function addNewСoordinationToJson ($urlJson, $dataObj) {
	$jsonData = file_get_contents($urlJson);
	$json = json_decode($jsonData, true);
	print_r($dataObj);
	$arr = explode(',', $dataObj);
	print_r($arr);
	foreach ($json as $key => $value) {
		if ($value['id'] == $arr['2']) {
			$json[$key]['positionX'] = $arr['0'];
			$json[$key]['positionY'] = $arr['1'];
		}
	}
	$result = json_encode($json, JSON_PRETTY_PRINT);
	file_put_contents($urlJson, $result);
}
