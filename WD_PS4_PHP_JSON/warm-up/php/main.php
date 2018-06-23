 <?php
 /*
	if (isset($_POST["enter"])){
		$a = $_POST["firstNumber"];
		$b = $_POST["secondNumber"];
		firstTask($a, $b);

		<p> <?= !empty($_POST) ? firstTask($_POST['first'], $_POST['second']) : '' ?> </p>


	} */

	function firstTask ($first, $seconds) {
		if ( empty($first) || empty($seconds) )  { 
			echo "Строка пустая";
			return;
			}
		if ( is_numeric($first) && is_numeric($seconds) ) {
			echo "  число", PHP_EOL . "</br>";
		} else {
			echo "  НЕ число", PHP_EOL . "</br>";
			return;
		}
		if ($seconds < $first){
			[$first , $seconds ] = [$seconds, $first];
		}
		$result = 0;
		for ($i = $first; $i <= $seconds; $i++){
			$result += $i;
		}
		echo $result;
	}

	function secondTask($firstNumber, $secondNumber) {
		if ( empty($firstNumber) || empty($secondNumber) )  { 
			echo "Строка пустая";
			return;
			}
		if ( is_numeric($firstNumber) && is_numeric($secondNumber) ) {
			echo " - число", PHP_EOL . "</br>";
		} else {
			echo " - НЕ число", PHP_EOL . "</br>";
			return;
		}
		if ($secondNumber < $firstNumber){
			[$firstNumber , $secondNumber ] =  [$secondNumber, $firstNumber];
		}
		$result = 0;
		for($i = $firstNumber; $i <= $secondNumber; $i++){
			$check = $i % 10;
			if($check == 2 || $check === 3 || $check == 7){
				$result += $i;
			}
		}
		echo $result;
	}

	function thirdTask($listHeight){
		if ( empty($listHeight) )  { 
			echo "Строка пустая";
			return;
			}
		if ( is_numeric($listHeight) ) {
			echo " число", PHP_EOL . "</br>";
			
		} else {
			echo " не - число", PHP_EOL . "</br>";
			return;
		}
		$star = "";
		$list = "";
		for ($i = 1; $i <= $listHeight; $i++){
			$star = $star."*";
			$list = $list.$star.'</br>';
		}
		echo $list;
	}
/*<li class = "secondLien" style="display: inline-block"> _1_ </li>*/
	function fourTask($boardHeight, $boardWidth){
		for ( $i = 0; $i <= $boardHeight; $i++ ) {
			echo '<ul style="margin: 0 ">';
			for( $j = 0; $j <= $boardWidth; $j++ ) {
				if ($i % 2 === 0){
					echo '<li class = "secondLien" style="display: inline-block; background-color: #ffffff;padding: 5px "> </li> ';
				}
				else {
					echo '<li class = "firstLine" style="display: inline-block; background-color: red;padding: 5px"> </li>';
				}
			}
			echo '</ul>';
		}
	}

	function fiveTask($str)	{
		echo $str."</br>";
		$test = str_split($str) . "</br>";
		echo $test;
		for ($i = 0; $i < count($test); $i++) {
			$result += $test[$i];
		}
		echo $result."</br>";

		foreach ($variable as $key => $value) {
			# code...
		}
		foreach ($test as $value) {
			echo "тест";
		}

	}

	function sixTask(){
		for( $i=0, $maxNum = 100; $i < $maxNum; $i++) {
			$arr[$i] = rand(1,10); // add random number
		}
		$result = (array_unique($arr)); // remove repeat
		print_r($result)."</br>";
		sort($result); // sort
		print_r($result)."</hr>";
		$result = array_reverse($result); // reverse
		print_r($result)."</br>";

	}
?>
