<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WD_PS4_PHP_JSON warm-up</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!--favicon-->
	<link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<!--favicon-->

	<?php
		include "php/main.php";
	?> 

</head>
<body>
	<header>
		<h1>PHP</h1>
	</header>

	<main>
		<div class="wraper">
			<div class="firstTask">
				<h2>first Task</h2>
				<p>1) посчитать сумму чисел от -1000 до 1000</p>
				<form  method="POST" >
					<input type="text" name="firstTask" class="hiddenInput" value="firstTask">
					<input type="text" name="firstNumber">
					<input type="text" name="secondNumber">
					<input type="submit" name="enter">
						<p id="firstTaskResult"> <?php
							if(isset($_POST['enter'])){
								firstTask($_POST['firstNumber'], $_POST['secondNumber']);
							}
						 ?></p>
				</form>
			</div>
			<hr>

			<div class="SecondTask">
				<h2>Second Task</h2>
				<p>2)посчитать сумму чисел от -1000 до 1000, суммируя только числа которые заканчиваются на 2,3, и 7</p>
				<form action="" method="POST">
					<input type = "text" name ="firstNumberSecondTask">
					<input type = "text" name = "secondNumberSecondTask">
					<input type = "submit" name = "enterSecondTask" >
					<p id="secondTaskResult">
					<?php
					if (isset($_POST['enterSecondTask'])) {
						secondTask($_POST['firstNumberSecondTask'], $_POST['secondNumberSecondTask']); 
					}
					?> 
					 </p>
				</form>
			</div>
			<hr>

			<div class="thirdTask">
				<h2>Third Task</h2>
				<p>вывести на страницу список из 50 элементов вида:</p>
				<form action="" method="POST">
					<input type="text" name="numberThirdTak">
					<input type="submit" name="enterThirdTask">
				<div class="resultThirdTask">
					<p><?php 
					if (isset($_POST['enterThirdTask'])) {
						thirdTask($_POST['numberThirdTak']);
					}
					?></p>
				</div>
			</form>
			</div>
			<hr> 

			<div class="fourTask">
				<h2>Four Task</h2>
				<p>Шахматная доска </p>
				<form action="" method="POST">
					<input type="text" name="numberFourTak">
					<input type="text" name="secondFourTak">
					<input type="submit" name="enterFourTask">
				<div class="resultFourTask">
					<p><?php 
					if ( isset($_POST['enterFourTask'])) {
						fourTask($_POST['numberThirdTak']);
					}
					?></p>
				</div>
			</form>
			</div>

		</div>
	</main>
	<footer>
		
	</footer>


</body>
</html>