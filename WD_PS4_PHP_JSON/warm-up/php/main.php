<?php
	if (isset($_POST["enter"])){
		$a = $_POST["firstNumber"];
		$b = $_POST["secondNumber"];
		firstTask($a, $b);
	}

	function firstTask($first =-1000, $seconds = 1000)
	{
		if ($seconds < $first){
			[$first , $seconds ] =  [$seconds, $first];
		}
		$result = 0;
		for ($i = $first; $i <= $seconds; $i++){
			$result += $i;
		}
		echo $result;
	}	

?>

