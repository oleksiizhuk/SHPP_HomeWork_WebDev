 <?php
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
		if ( $seconds < $first ) {
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
		if ($secondNumber < $firstNumber) {
			[$firstNumber, $secondNumber ] = [$secondNumber, $firstNumber];
		}
		$result = 0;
		for ($i = $firstNumber; $i <= $secondNumber; $i++) {
			$check = $i % 10;
			if ($check == 2 || $check === 3 || $check == 7) {
				$result += $i;
			}
		}
		echo $result;
	}

	function thirdTask($listHeight){
		if ( empty($listHeight) ) { 
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
		for ($i = 1; $i <= $listHeight; $i++) {
			$star = $star."*";
			$list = $list.$star.'</br>';
		}
		echo $list;
	}

	function fourTask($boardHeight, $boardWidth){
		for ($i = 1; $i <= $boardHeight; $i++) {
			echo '<ul class="flex">';
			for ($j = 1; $j <= $boardWidth; $j++) {
				if ( $i % 2 === 0 ){
					echo '<li class="secondLien"></li>';
				} else {
					echo '<li class="firstLine"></li>';
				}
			}
			echo '</ul>';
		}
		
	}

	function fiveTask($str)	{
		if ( !ctype_digit($str) ) {
			echo "введите только числа";
			return;
		}
		$result = array_sum( str_split($str) );
		echo $result."</br>";
	}

	function sixTask(){
		for( $i=0, $maxNum = 100; $i < $maxNum; $i++) {
			$arr[$i] = rand(1,10); // add random number
		}
		$result = array_unique($arr); // remove repeat
		sort($result); // sort
		$result = array_reverse($result); // reverse
		foreach ($result as $key => $item) {
			echo "[".$key."] - ".$item."</br>";
		}

	}
?>
