<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/normalize/normalize.css">
	
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
					<form action="#">
						<label class="container">3-15
							<input type="radio" checked="checked" name="radio">
							<span class="checkmark"></span>
						</label>

						<label class="container">15-30
							<input type="radio" name="radio">
							<span class="checkmark"></span>
						</label>

						<label class="container">30-45
							<input type="radio" name="radio">
							<span class="checkmark"></span>
						</label>

						<label class="container">45+
							<input type="radio" name="radio">
							<span class="checkmark"></span>
						</label>
						<input type="submit" value="отправить">
					</form>
				</div>

				<div class="question">
					<p>Сколько вам лет</p>
				</div>

			</div>
		</div>
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