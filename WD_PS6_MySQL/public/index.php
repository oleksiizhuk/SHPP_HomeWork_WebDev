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
				<input type="password" placeholder="••" id="password" name="password">		
				<input type="hidden" value="loggingOrRegister" name="submit">
				<button id="submit" class="submit">Submit</button>
			</form>
		</div>
		<div class="erBlock">
			<?php
			if (isset($_SESSION['error'])) {
				echo $_SESSION['error'];
			}
			session_unset();
			session_destroy();
		?>
		</div>
		
	</main>
	<footer>
		
	</footer>
</body>
</html>