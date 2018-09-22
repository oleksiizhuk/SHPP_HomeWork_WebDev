<?php session_start() ?>
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

</head>
<body>
	<header>
		<h1>PHP</h1>
	</header>

	<main>
		<div class="wraper">
			
			<div class="firstTask">
				<h2>first Task</h2>
				<p>1  посчитать сумму чисел от -1000 до 1000</p>

				<form  method="POST" action="php/main.php">
					<input type="hidden" value="task1" name="submit">
					<input type="text" name="firstTask" 
					class="hiddenInput" value="firstTask">

					<input type="number" name="firstNumber">
					<input type="number" name="secondNumber">
					<input type="submit" name="enter" value="посчитать">
				</form>

				<p id="firstTaskResult"> 
					<?php
						if (isset($_SESSION['task']) && $_SESSION['task'] === 'task1') {
							echo $_SESSION['result'];
						}
					?>
				</p>
			</div>
			<hr>

			<div class="SecondTask">
				<h2>Second Task</h2>
				<p>2 посчитать сумму чисел от -1000 до 1000, суммируя только числа которые заканчиваются на 2,3, и 7</p>
				<form action="php/main.php" method="POST">
					<input type="hidden" value="task2" name="submit">
					<input type = "number" name ="firstNumberSecondTask">
					<input type = "number" name = "secondNumberSecondTask">
					<input type = "submit" name = "enterSecondTask" value="посчитать">
					<input type="hidden" value="task2" name="enter" >
				</form>

				<p id="secondTaskResult">
					<?php
						if (isset($_SESSION['task']) && $_SESSION['task'] === 'task2') {
							echo $_SESSION['result'];
						}
					?>
				 </p>
			</div>
			<hr>

			<div class="thirdTask">
				<h2>Third Task</h2>
				<p>вывести на страницу список из 50 элементов вида:</p>
				<form action="php/main.php" method="POST">
					<input type="hidden" value="task3" name="submit">
					<input type="submit" name="enterThirdTask" value="вывести">
				</form>
				<div class="resultThirdTask">
					<p>
					
						<?php
						if (isset($_SESSION['task']) && $_SESSION['task'] === 'task3') {
							echo $_SESSION['result'];
						}
					?>
					</p>
				</div>
			</div>
			<hr>

			<div class="fourTask">
				<h2>Four Task</h2>
				<p>Шахматная доска </p>
				<form action="php/main.php" method="POST">
					<input type="text" name="numberFourTak">
					<input type="text" name="secondFourTak">
					<input type="hidden" value="task4" name="submit">
					<input type="submit" name="enterFourTask" value="Построить доску">
				</form>
				<div class="resultFourTask">
					<?php
						if (isset($_SESSION['task']) && $_SESSION['task'] === 'task4') {
							echo $_SESSION['result'];
						}
					?>
				</div>
			</div>

			<div class="fiveTask">
				<h2>five task</h2>
				<p>5 Найти сумму цифр введённого числа.</p>
				<form action="php/main.php" method="POST">
					<input type="text" name="fiveTaskValue" value="">
					<input type="hidden" value="task5" name="submit">
					<input type="submit" name="enterFiveTask" value="посчитать">
				</form>
				<p>
					<?php
						if (isset($_SESSION['task']) && $_SESSION['task'] === 'task5') {
							echo $_SESSION['result'];
						}
					?>
				 </p>
			</div>
			<hr>

			<div class="sixTask">
				<h2>six task</h2>
				<p>​6 ​Сгенерировать массив рандомных целых чисел от 1 до 10, длинна массива 100. Убрать из массива повторы, отсортировать и ревертнуть.</p>
				<form action="php/main.php" method="POST">
					<input type="hidden" value="task6" name="submit">
					<input type="submit" name="enterSixValue" value="Сгенерировать массив">
				</form>
				<p>
					<?php
						if (isset($_SESSION['task']) && $_SESSION['task'] === 'task6') {
							print_r($_SESSION['result']);
						}
						session_destroy();
					?>
				</p>
			</div>

		</div>
	</main>
	<footer>
		<div class="wraper">
			<h2>cool</h2>
		</div>
	</footer>
</body>
</html>
