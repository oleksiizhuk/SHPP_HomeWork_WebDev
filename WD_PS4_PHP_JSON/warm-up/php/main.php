 <?php
 /*
	if (isset($_POST["enter"])){
		$a = $_POST["firstNumber"];
		$b = $_POST["secondNumber"];
		firstTask($a, $b);

		<p> <?= !empty($_POST) ? firstTask($_POST['first'], $_POST['second']) : '' ?> </p>


	} */

	function firstTask($first =-1000, $seconds = 1000){
		if ($seconds < $first){
			[$first , $seconds ] = [$seconds, $first];
		}
		$result = 0;
		for ($i = $first; $i <= $seconds; $i++){
			$result += $i;
		}
		echo $result;
	}

	function secondTask($firstNumber =- 1000, $secondNumber = 1000){
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
		$star = "";
		$list = "";
		for ($i = 1; $i <= $listHeight; $i++){
			$star = $star."*";
			$list = $list.$star.'</br>';
		}
		echo $list;
	}

	function fourTask($firstNumberFT, $secondNumberST){
		for ($i = 1; $i <= $firstNumberFT; $i++ ) {
			echo "<ul>";
			for($j = 1; $j <= $secondNumberST; $j++ ) {
				if ($i % 2 === 0){
					echo '<li class = "SecondLien"> _1_ </li>';
				}
				else {
					echo '<li class = "firstLine"> _2_ </li>';
				}
			}
			echo "</ul>";
		}
	}

	function fiveTask($value)	{
		echo $value;

	}

?>
