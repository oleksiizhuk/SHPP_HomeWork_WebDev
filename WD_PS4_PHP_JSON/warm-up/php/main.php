<?php
session_start();
$_SESSION['task'] = $_POST['submit'];
switch ($_SESSION['task']) {
		case 'task1':
				$result = firstTask ();
				break;
		case 'task2':
				$result = secondTask ();
				break;
		case 'task3':
				$result = thirdTask ();
				break;
		case 'task4':
				$result = fourTask ();
				break;
		case 'task5':
				$result = fiveTask ();
				break;
		case 'task6':
				$result = sixTask ();
				break;
		default:
				# code...
				break;
}
$_SESSION['result'] = $result;
header("Location:../index.php");

function firstTask() {
	$first = $_POST['firstNumber'];
	$seconds = $_POST['secondNumber'];
	if ( isEmpty($first) || isEmpty($seconds) )  { 
		return "Строка пустая";
	} 
	if ( !isNumeric($first) || !isNumeric($seconds) ) {
		return "ввели не правильное значение";
	}
	if ( $seconds < $first ) {
		[$first , $seconds ] = [$seconds, $first];
	}
	$result = 0;
	for ($i = $first; $i <= $seconds; $i++){
		$result += $i;
	}
	return $result;
}

function secondTask() {
	$firstNumber = $_POST['firstNumberSecondTask'];
	$secondNumber = $_POST['secondNumberSecondTask'];
	if ( isEmpty($firstNumber) || isEmpty($secondNumber) )  { 
			return "Строка пустая";
	} 
	if ( !isNumeric($firstNumber) || !isNumeric($secondNumber) ) {
			return "ввели не правильное значение";
	}
	if ( $secondNumber < $firstNumber ) {
		[$firstNumber , $secondNumber ]=[$secondNumber, $firstNumber];
	}
	$result = 0;
	for ($i = $firstNumber; $i <= $secondNumber; $i++) {
		$check = $i % 10;
		if ($check == 2 || $check === 3 || $check == 7) {
			$result += $i;
		}
	}
return $result;
}

function thirdTask() {
	$listHeight = $_POST['numberThirdTak'];
	if( isEmpty($listHeight)  ) {
		return "Строка пустая";
	}
	if (!isNumeric($listHeight) ){
		return "ввели не правильное значение";
	}
	$star = "";
	$list = "";
	for ($i = 1; $i <= $listHeight; $i++) {
		$star = $star."*";
		$list = $list.$star.'</br>';
	}
	return $list;
}

function fourTask() {
	$boardHeight = $_POST['numberFourTak'];
	$boardWidth = $_POST['secondFourTak'];
	$result;
	for ($i = 1; $i <= $boardHeight; $i++) {
		$result = $result.'<ul class="flex">';
			for ($j = 1; $j <= $boardWidth; $j++) {
				if ( $i % 2 === 0 ){
					$result =$result.'<li class="secondLien"></li>';
				} else {
					$result = $result.'<li class="firstLine"></li>';
				}
			}
		$result = $result.'</ul>';
	}		
	return $result;
}

function fiveTask() {
	$stringOfNumbers = $_POST['fiveTaskValue'];
	if ( !ctype_digit($stringOfNumbers) ) {
		return "ввели не правильное значение";
	}
	$result = array_sum( str_split($stringOfNumbers) );
	return $result."</br>";
}

function sixTask() {
	for($i = 0, $maxNum = 100; $i < $maxNum; $i++) {
		$arr[$i] = rand(1,10);  // add random number
	}
	$tempArr = array_unique($arr); // remove repeat
	sort($tempArr); // sort
	$tempArr = array_reverse($tempArr); // reverse
	foreach ($tempArr as $key => $item) {
		$result = $result."[".$key."] - ".$item."</br>";
	}
	return $result;
}

function isEmpty($val) {
		return empty($val);
}
function isNumeric($val) {
		return is_numeric($val);
}
?>
