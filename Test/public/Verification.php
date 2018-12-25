<?php
session_start();
if (isset($_SESSION['user'])) {
    header('location:index.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/verificationCss/index.css">
    <title>verification</title>
</head>
<body>
<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-12 hidden-xs login-page">
            <form action="handler.php" class="form_verification" method="post">
                <label for="login" class="label">логин</label>
                <input type="text" id="login" name="login">
                <label for="password" class="label">пароль</label>
                <input type="password" id="password" name="password">
                <input type="submit" name="verification" class="button submit" value="registration">
                <input type="submit" name="verification" class="button submit" value="logIn">
                <?php
                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
            </form>

        </div>
    </div>
</div>
</body>
</html>