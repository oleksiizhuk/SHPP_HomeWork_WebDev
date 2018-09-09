<?php
$urlJson = __DIR__ . DIRECTORY_SEPARATOR . 
	'..' . DIRECTORY_SEPARATOR . 'json' .
	 DIRECTORY_SEPARATOR . 'index.json';

if ( isset($_POST['objData1']) ) {
	$objData = $_POST['objData1'];
	putToJson($objData, $urlJson);
	return;
} 

if ( isset($_POST['getDrag'])) {
	getJson($urlJson);
}

else {
	echo "lol1";
	return;
}


function putToJson($objData, $urlJson) {
	$jsonData = file_get_contents($urlJson);
	$json = json_decode($jsonData);
	$objData = json_decode($objData, true);

	$json[] = $objData;
	$result = json_encode($json, JSON_PRETTY_PRINT);
	// for ($i = 0; $i < sizeof($json); $i++ ){
	// 	if ($json[$i]['id'] === 1){
	// 		$json[$i]['positionX']+=1;
	// 		echo "yep ";
	// 	} else {
	// 		echo $json[$i]["id"]	;
	// 	}
	// }
	if(file_put_contents($urlJson, $result)) {
	        echo 'Data successfully saved';
	    }
}

function getJson($urlJson) {
		$jsonData = file_get_contents($urlJson);
		//$json[] = (array) json_decode(($jsonData));
		//$json =  json_encode($jsonData, true);
		//var_dump($json);
		print_r($jsonData);
}

function removeFromJson() {
	$urlJson = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'json' . DIRECTORY_SEPARATOR . 'index.json';
	$jsonData = file_get_contents($urlJson);
}


