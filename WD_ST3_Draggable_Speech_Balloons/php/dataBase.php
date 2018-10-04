<?php
$urlJsonDraggeble = __DIR__ . DIRECTORY_SEPARATOR . 
	'..' . DIRECTORY_SEPARATOR . 'json' .
	 DIRECTORY_SEPARATOR . 'index.json';


$handlerJson = new handlerJson($urlJsonDraggeble);

if ( isset($_POST['objData1']) ) {
	$objData = $_POST['objData1'];
	$handlerJson->putToJson($objData);
	return;
} 

if (isset($_POST['getId'])) {
	$ressut = $handlerJson->getId();
	echo $ressut;
	return;
}

if ( isset($_POST['getInfoAboutDraggableFromJson'])) {
	$result = $handlerJson->getInfoAboutDraggableFromJson();
	print_r($result);
	return;
}

if ( isset($_POST['informationOnTheBlock'])) {
	$objInfo = $_POST['informationOnTheBlock'];
	$handlerJson->replaceContent($objInfo);
	return;
}

if ( isset($_POST['removeElementById'])) {
	$id = $_POST['removeElementById'];
	$handlerJson->removeElementById($id);
	return;
}

if( isset($_POST['addNewСoordinationToJson'])) {
	$dataObj = $_POST['addNewСoordinationToJson'];
	$handlerJson->addNewСoordinationToJson($dataObj);
	return;
}

class handlerJson
{
	private $urlJson;

	function __construct($urlJson)
	{
		$this->urlJson = $urlJson;
	}

	public function putToJson($objData) {
		$jsonData = file_get_contents($this->urlJson);
		$json = json_decode($jsonData);
		$objData = json_decode($objData, true);
		$json[] = $objData;
		$result = json_encode($json, JSON_PRETTY_PRINT);
		if(file_put_contents($this->urlJson, $result)) {
	        echo 'Data successfully saved';
	    }
	}

	public function getId() {
		$jsonData = file_get_contents($this->urlJson);
		$json = json_decode($jsonData);
		return count($json);
	}

	public function getInfoAboutDraggableFromJson () {
	 	$jsonData = file_get_contents($this->urlJson);
		return $jsonData;
	}

	public function replaceContent ($objInfo) {
		$jsonData = file_get_contents($this->urlJson);
		$json = json_decode($jsonData, true);
		$arr =  explode(',', $objInfo);
		foreach ($json as $key => $value) {
			if ($value['id'] == $arr[0]) {
				$json[$key]['content'] = $arr[1];
			}
		}
		$result = json_encode($json, JSON_PRETTY_PRINT);
		file_put_contents($this->urlJson, $result);
	}

	public function removeElementById($objId) {
		$jsonData = file_get_contents($this->urlJson);
		$json = json_decode($jsonData, true);

		foreach ($json as $key => $value) {
			if($value['id'] == $objId) {
				$json[$key]['deleted'] = true;
			}
		}
		$result = json_encode($json, JSON_PRETTY_PRINT);
		echo $result;
		file_put_contents($this->urlJson, $result);
	}

	public function addNewСoordinationToJson ($dataObj) {
		$jsonData = file_get_contents($this->urlJson);
		$json = json_decode($jsonData, true);
		$arr = explode(',', $dataObj);
		foreach ($json as $key => $value) {
			if ($value['id'] == $arr[2]) {
				$json[$key]['positionX'] = $arr[0];
				$json[$key]['positionY'] = $arr[1];
			}
		}
		$result = json_encode($json, JSON_PRETTY_PRINT);
		file_put_contents($this->urlJson, $result);
	}
}