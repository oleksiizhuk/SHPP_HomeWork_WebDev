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
            <label for="login" class="label">Enter your name</label>
            <input type="text" placeholder="John Doe" id="login" name="login" required>
            <label for="password" class="label">Enter your password</label>
            <input type="password" placeholder="" id="password" name="password" required>
            <button id="submit" class="submit" name="submit" type="submit">Submit</button>
        </form>
    </div>
    <div class="erBlock">
        <?php
        if (isset($_SESSION['login'])) {
           // header('location:chat.php');
        }
        if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
        ?>
    </div>

</main>
<footer>

</footer>
</body>
</html>