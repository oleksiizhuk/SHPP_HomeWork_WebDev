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
		<h1>404</h1>
		<div class="erBlock">
			<?php
			if (isset($_SESSION['error'])) {
				$message = $_SESSION['error'];
				echo $message;
			}
			session_destroy();
		?>
		</div>
		
	</main>
</body>
</html>