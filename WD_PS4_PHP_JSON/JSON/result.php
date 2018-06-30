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
		<a href="index.php"><h2>Голосуй</h2></a>		
		</div>
	</header>
	<section>
		<?php

		$userChoice = $_POST['radio'] / 1000;

			if (isset($_POST['radio'])){
				//echo "<p>пришел запрос</p>";
			}else {
				//echo "<p>запрос не пришел</p>";
				return;
			}

			$urlJson = "json/index.json";
			$jsonData = file_get_contents($urlJson);
			$json = json_decode($jsonData, true);

			$json["option".$userChoice]++;

			$json = json_encode($json);	
			file_put_contents($urlJson, $json, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
		?>
		<!-- <script> var objDataJson = <?=$json.';' ?></script> -->
		<div id="donutchart" style="width: 600px; height: 400px;"></div>
	</section>
	<footer>
		<div class="container">
			<span>результат</span>
		</div>
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script src="js/index.js"></script>
</body>
</html>