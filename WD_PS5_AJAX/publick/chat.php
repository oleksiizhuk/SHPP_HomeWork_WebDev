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
		<div class="container">
			<h1>Easy Chat</h1>
			<textarea name="comment" cols="40" rows="10" rows="3" class="textarea"></textarea>

			<form action="handler.php" method="post">
				<input type="text" class="inputSemd">
				<input type="submit" value="Send" class="send">
			</form>
		</div>
	</main>
	<footer>
		
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/index.js"></script>
</body>
</html>
