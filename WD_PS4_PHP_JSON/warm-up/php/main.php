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
		echo $listHeight;
		$list;
		$star;
		for ($i = 1; $i <= $listHeight; $i++){
			$star = $star."*";
			$list = $list.$star.'</br>';
			
		}
		echo $list;
	}

	function fourTask($firstNumberFT, $secondNumberST){
		for($i = 1;$i <= $firstNumberFT; $i++ ){
			for($k = 1;$k <= $secondNumberST; $k++ ){
				echo "hi";
				print'<li>чё ты </li>';
			}
		}
	}

?>

