<?php

class CheckRequst
{
	
	public function checkEmpty($login, $password) {
		if (empty($login)) {
			return "введите логин";
		}
		if (empty($password)) {
			return "введите пароль";
		}
		return true;
	}

	public function regularLogin ($login) {
		$test = preg_match('%^[a-z0-9_-]{1,16}$%', $login);
		echo $test;
	}
	public function regularPassword ($password) {
		$test = preg_match('%^[a-z0-9_-]{1,16}$%', $password);
		echo $test;
	}

	public function checkIsset() {
		return !isset($_POST['login']) && !isset($_POST['password']) ? false : true;
	}

	public function checkAjax() {
		return !isset($_POST['addNewMsg']) ? false : true;
	}
	public function checkAjaxGetMsg () {
		return !isset($_POST["getMsg"]) ? "false" : "true";
	}
}