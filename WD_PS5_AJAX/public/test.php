<?php
	echo $today = date("F j, Y, g:i a")."</br>";
	echo $today = date("m.d.y")."</br>"; 
	echo $today = date("j, n, Y")."</br>";
	echo $today = date("Ymd")."</br>";
	echo $today = date('h-i-s, j-m-y, it is w Day')."</br>";
	echo $today = date('\i\t \i\s \t\h\e jS \d\a\y.')."</br>";
	echo $today = date("D M j G:i:s T Y")."</br>";
	echo $today = date('H:m:s \m \i\s\ \m\o\n\t\h')."</br>";
	echo $today = date("H:i:s")."</br>";
	echo $today = date("Y-m-d H:i:s")."</br>"; 
	echo strtotime(date("Y-m-d H:i:s"))."</br>";
	echo time("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")))."</br>";
	$test = time("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")))."</br>";
	echo date("H:i:s", 1538211073)."</br>";
	//echo date("H:i:s", 15:38:30)."</br>";
	$test = time("Y-m-d H:i:s", strtotime(date("Y-m-d 15:38:30")))."</br>";
	
	//print_r( $message );

	$UnloadMsg = new UnloadFromJson;
	$message = $UnloadMsg->unloadMessage();
class UnloadFromJson
{
	private $urlJson = __DIR__ . DIRECTORY_SEPARATOR . 'testJson' . DIRECTORY_SEPARATOR . 'message.json';

	public function checkJsonUrl()	{
        return (file_exists($this->urlJson));
    }

    public function unloadMessage()	{
		$jsonData = file_get_contents($this->urlJson);
		$json = json_decode($jsonData, true);
		$filterToTime = time("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")));
		$count = 0;
		foreach ($json as $key => $value) {
			$count++;
			$result = $filterToTime - $value['time'];
			if ($result > 3600) {
				$newArray[$count]['user'] = $value['user'];
				$newArray[$count]['message'] = $value['message'];
				$newArray[$count]['time'] = date("H:i:s", $value['time']);
			}
		}
		/*foreach ($newArray as $key => $value) {
			//echo $key." ";
			print_r($value);
			echo "</br>";
		}*/
		
		$result = json_encode($newArray, JSON_PRETTY_PRINT);
		return $result;
		/*return $newArray;*/
	}
}

		/*foreach ($json as $key => $value) {
			echo $key." ";
			print_r($value);
			echo "</br>";
		}*/


/*echo $result."</br>";
			echo "key - ".$key."</br>";
			echo "value['time'] - ".$value['time']."</br>";
			//echo "value[key] - ".$value[0]."</br>";
			echo "$value - ".$json[$key]."</br>";
			//echo "$value - ".$value."</br>";*/