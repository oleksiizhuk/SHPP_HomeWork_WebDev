<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/normalize/normalize.css">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="js/index.js"></script>
</head>
<body>
	<header>
		<div class="container-block">
			<h2>Голосуй</h2>		
		</div>
	</header>
	<section>
		<?php
		echo $_POST['radio'];
			if (isset($_POST['radio'])){
				echo "<p>пришел запрос</p>";
			}else {
				echo "<p>запрос не пришел</p>";
			}
			$urlJson = "json/index.json";
			$jsonData = file_get_contents($urlJson);
			$json = json_decode($jsonData, true);
			print_r($json);
		?>
		<div id="donutchart" style="width: 600px; height: 400px;"></div>
	</section>
	<footer>
		<div class="container">
			<span>результат</span>
		</div>
	</footer>
	
</body>
</html>