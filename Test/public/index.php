<?php
session_start();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <title>Главная</title>
</head>
<body>
<div class="container-fluid main-container">
    <div class="row content">
        <div class="col-sm-3 sidenav hidden-xs">
            <div class="block-1 border">
                <h2>Logo</h2>
                <div class="list-group">
                    <a href="index.php" class="list-group-item checked" id="main">Главная</a>
                    <a href="#" class="list-group-item" id="T-shirt">футболка</a>
                    <a href="#" class="list-group-item" id="Jeans">Джинсы</a>
                    <a href="#" class="list-group-item" id="Trousers">Брюки</a>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="block-3 panel">
                <div class="container-fluid">
                    <div class="row content">
                        <div class="col-sm-4">
                            <div class="container_dropbox">
                                <div class="dropdown open">
                                    <button class="btn btn-secondary dropdown-toggle sort" type="button"
                                            id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Cортировка
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item sort" id="priceSort" href="#">по цене</a>
                                        <a class="dropdown-item sort" id="alphabetSort" href="#">по алфавиту</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="admin__panel">
                                <?php
                                if (isset($_SESSION['user'])) {
                                    if ($_SESSION['user'] == 'admin') {
                                        echo '<a href="#" data-toggle="modal" data-target="#forn__Modal" class="btn btn-primary btn-sm">добавить товар</a>';
                                        if (isset($_SESSION['error'])) {
                                            echo $_SESSION['error'];
                                            unset($_SESSION['error']);
                                        }
                                    }
                                }
                                ?>
                            </div>

                            <div id="forn__Modal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button class="close" type="button" data-dismiss="modal">×</button>
                                        </div>
                                        <form action="handler.php" class="modal-body" method="post"
                                              enctype="multipart/form-data">
                                            <label for="product" class="label">категория</label>
                                            <input list="product" name="product">
                                            <datalist id="product">
                                                <option value="футболка">
                                                <option value="джинсы">
                                                <option value="брюки">
                                            </datalist>
                                            <label for="name" class="label">описание товара</label>
                                            <input type="text" id="name" name="name">
                                            <label for="price" class="label">цена</label>
                                            <input type="number" id="price" name="price">
                                            <label for="file"></label>
                                            <input type="file" id="file" name="file">
                                            <input type="submit" name="sub" class="button submit">
                                        </form>
                                        <div class="modal-footer">
                                            <button class="btn btn-default" type="button" data-dismiss="modal">
                                                Закрыть
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <?php
                            if (isset($_SESSION['user'])) {
                                echo "
                                <div class='user_panel'>
                                Здравствуйте:
                                    <p><span class='user_identifier'>" . $_SESSION['user'] . "</span></p> 
                                        <form action='handler.php' method='post'>
                                            <input type='submit' name='logout' value='выйти'>
                                         </form>     
                                </div>";
                            } else {
                                echo "
                                <div class='verification__panel'>
                                     <a href='verification.php'>войти</a>
                                 </div>";
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container-fluid catalog">
                <div class="row content catalog__item__container">

                </div>
            </div>
        </div>
    </div>

</div>
<!-- Footer -->
<div class="container-fluid footer">
    <div class="row content">
        <div class="col-sm-12">
            <footer class="page-footer font-small blue">

                <div class="footer-copyright text-center py-3">© 2018 Copyright:

                </div>

            </footer>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script src="js/index.js"></script>
</body>
</html>