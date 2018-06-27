<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/normalize/normalize.css">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	
</head>
<body>

	<header>
		<div class="container-block">
			<h2>Голосуй</h2>		
		</div>
	</header>

	<section>
		<div class="container-block">
			<div class="main">
				
				<div class="block-form">
					<form action="result.php" method="post">
						<label class="container">1000
							<input type="radio" checked="checked" name="radio" value="1000">
							<span class="checkmark"></span>
						</label>

						<label class="container">2000
							<input type="radio" name="radio" value="2000">
							<span class="checkmark"></span>
						</label>

						<label class="container">3000
							<input type="radio" name="radio" value="3000">
							<span class="checkmark"></span>
						</label>

						<label class="container">4000
							<input type="radio" name="radio" value="4000">
							<span class="checkmark"></span>
						</label>
						<input type="submit" value="enter">
					</form>
					<?php
						
					?>
				</div>

				<div class="question">
					<p>Какая у вас зарплата? </p>
				</div>

			</div>
		</div>
		<script type="text/javascript">
        </script>
     
	</section>

	<footer>
		<div class="container-block">
			<span>footer</span>
		</div>	
	</footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/index.js"></script>
</body>
</html>