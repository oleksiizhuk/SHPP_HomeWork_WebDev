<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/normalize/normalize.css">
</head>
<body>

	<header class="header">
		<div class="header__container-block">
			<h2>Vote</h2>   
		</div>
	</header>

	<section class="section">
		<div class="sectio__container-block">

				<div class="question">
					<p>Какую машину вы выберете? </p>
				</div>
				
				<div class="block-form">
					<form action="handler.php" method="post">
						<label class="container">BMW
							<input type="radio" checked="checked" name="radio" value="BMW">
							<span class="checkmark"></span>
						</label>

						<label class="container">Audi
							<input type="radio" name="radio" value="Audi">
							<span class="checkmark"></span>
						</label>

						<label class="container">GMC
							<input type="radio" name="radio" value="GMC">
							<span class="checkmark"></span>
						</label>

						<label class="container">Zhiguli
							<input type="radio" name="radio" value="Zhiguli">
							<span class="checkmark"></span>
						</label>
						<input type="hidden" value="choice" name="submit">
						<input type="submit" value="vote" id="button" >
					</form>
				</div>
				<?php
					if (isset($_SESSION['error'])) {
						echo $_SESSION['error'];
					}
					session_destroy();
				?>
		</div>   
	</section>

	<footer>
		<div class="container-block">
		</div>  
	</footer>
</body>
</html>