<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/normalize/normalize.css">
</head>
<body>
	<header id="header" class="header">
		<div class="container__header">
		</div>
	</header>
	<section class="chatSection">
<!-- 		<div class="chatSection__container"> -->
			<h1>Easy Chat</h1>

			<?php
				if(isset($_SESSION['login'])) {
					echo $_SESSION['login'];
				}
			?>
			<div class="chatSection__container">
				<div class="chatSection__container__chatWindow">
					<div class="bubblechat right">
						<p><span>User: </span>Hey there! What's up?</p>
					</div>

					<div class="bubblechat left">
						<p><span>User: </span> Hey there! What's up?</p>
					</div>

					<div class="bubblechat right">
						<p><span>User: </span> Hey there! What's up?</p>
					</div>

				</div>
			</div class="chatSection__container">

			<form action="#" class="chatSection__form">
				<input type="text" class="inputSend" id="inputSend">
				<input type="submit" value="sendMsg" class="sendMsg" id="sendMsg">
			</form>
		</div>
	</section>
	<footer>
		
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/index.js"></script>
</body>
</html>
