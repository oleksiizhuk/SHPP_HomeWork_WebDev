<?php
session_start();
if (isset($_POST['submit'])) {
		$_SESSION['task'] = $_POST['submit'];
}
switch ($_SESSION['task']) {
		case 'task1':
			$_SESSION['result'] = firstTask();
			break;
		case 'task2':
			$_SESSION['result'] = secondTask();
			break;
		case 'task3':
			$_SESSION['result'] = thirdTask();
			break;
		case 'task4':
			$_SESSION['result'] = fourTask();
			break;
		case 'task5':
			$_SESSION['result'] = fiveTask();
			break;
		case 'task6':
			$_SESSION['result'] = sixTask();
			break;
}
header("Location:../index.php");

function firstTask() {
	$first = $_POST['firstNumber'];
	$seconds = $_POST['secondNumber'];
	if (!isNumeric($first) || !isNumeric($seconds)) {
		return "ошибка";
	}
	if ($seconds < $first) {
		[$first , $seconds] = [$seconds, $first];
	}
	$result = 0;
	for ($i = $first; $i <= $seconds; $i++) {
		$result += $i;
	}
	return $result;
}

function secondTask() {
	$firstNumber = $_POST['firstNumberSecondTask'];
	$secondNumber = $_POST['secondNumberSecondTask'];
	if (!isNumeric($firstNumber) || !isNumeric($secondNumber)) {
			return "ошибка";
	}
	if ($secondNumber < $firstNumber) {
		[$firstNumber , $secondNumber ] = [$secondNumber, $firstNumber];
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
	$list = "";
	$listHeight = 50;
	for ($i = 1; $i <= $listHeight; $i++) {
		$list .= str_repeat("*",$i).'</br>';
	}
	return $list;
}

function fourTask() {
	$boardHeight = $_POST['numberFourTak'];
	$boardWidth = $_POST['secondFourTak'];
	if ($boardHeight > 50 || $boardHeight < 1 || $boardWidth > 50 || $boardWidth < 1) {
		return "Размер доски от 1 до 50";
	}
	$result = ""; 
	for ($i = 1; $i <= $boardHeight; $i++) {
		$result .= '<ul class="flex">';
			for ($j = 1; $j <= $boardWidth; $j++) {
				$result .= $i % 2 === 0 ? '<li class="secondLien"></li>' : '<li class="firstLine"></li>';
			}
		$result .='</ul>';
	}		
	return $result;
}

function fiveTask() {
	$stringOfNumbers = $_POST['fiveTaskValue'];
	if (!isNumeric($stringOfNumbers)) {
		return "ввели не правильное значение";
	}
	$result = array_sum(str_split($stringOfNumbers));
	return $result."</br>";
}


function sixTask() {
	for ($i = 0; $i < 100; $i++) {
		$arr[$i] = rand(1,10);
	}
	$tempArr = array_unique($arr);
	sort($tempArr);
	$tempArr = array_reverse($tempArr); // reverse
	/*print_r($tempArr);
	foreach ($tempArr as $key => $item) {
		$result = $result."[".$key."] - ".$item."</br>";
	}
	$result = $tempArr;*/
	return $tempArr;
}
function isNumeric($val) {
		return is_numeric($val);
}


