<?php

$link = mysqli_connect('localhost', 'root', '', 'chat');

if (mysqli_connect_errno()) {
	echo 'ошибка подключению к базе данных ('.mysqli_connect_errno().'): '.mysqli_connect_error();
	exit();
} else 
	echo "подключенно";


