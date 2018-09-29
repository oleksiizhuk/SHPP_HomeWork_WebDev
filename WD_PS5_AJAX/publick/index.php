<?php
session_start();
?>
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
	<main>
		<div class="main__container">
			<h1>Easy Chat</h1>
			<form action="handler.php" id="form" method="post">
				<label for="login">Enter your name</label>
				<input type="text" placeholder="John Doe" id="login" name="login">
				<label for="password">Enter your password</label>
				<input type="password" placeholder="•••••" id="password" name="password">				
				<button id="submit" class="submit">Submit</button>
			</form>
		</div>
		<div class="erBlock">
			<?php
			if (isset($_SESSION['er'])) {
				echo $_SESSION['er'];
			}
			session_destroy();
		?>
		</div>
		
	</main>
	<footer>
		
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- <script src="js/index.js"></script> -->
</body>
</html>
