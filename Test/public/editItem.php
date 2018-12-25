<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/editItemCss/editItem.css">
    <title>Document</title>
</head>
<body>

<div class="container">
    <h2>Редактировать товар</h2>
    <?php
    echo "
    <form action='handler.php' method='post'
          enctype='multipart/form-data'>
        <label for='product' class='label'>категория</label>
        <input list='product' name='product' value='" . $_GET['category'] . "'>
        <datalist id='product'>
            <option value='футболка'>
            <option value='джинсы'>
            <option value='брюки'>
            <option value='куртки'>
        </datalist>      
        <label for='name' class='label'>описание товара</label>
        <input type='text' id='name' name='name' value='" . $_GET['title'] . "'>
        <label for='price' class='label'>цена</label>
        <input type='text' id='price' name='price' value='" . $_GET['price'] . "'>
        <label for='file'></label>
        <input type='file' id='file' name='file'>
        <input type='hidden' name='id' value='" . $_GET['id'] . "'>
        <input type='submit' name='subEdit' class='button_edit_item submit'>
        <img src='" . $_GET['img'] . "' alt=''>
    </form>"
    ?>
    <script type="text/javascript">
        document.getElementsByClassName('button').addEventListener("click", function (event) {
            window.close()
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/index.js"></script>
</div>
</body>
</html>