<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
}
$pattern = [
    'ip' => '/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/',
    'url' => '/(https|http|ftp)\:\/\/|([a-z0-9A-Z]+\.[a-z0-9A-Z]+\.[a-zA-Z]{2,4})|([a-z0-9A-Z]+\.[a-zA-Z]{2,4})|\?([a-zA-Z0-9]+[\&\=\#a-z]+)/i',
    'email' => '/^([a-z0-9_\.-]+)@([a-z0-9]+)\.([a-z]{2,6})$/',
    'date' => '/^(\d{2}).(\d{2}).(\d{4})$/',
    'time' => '/^([01]\d|2[0-3])(:[0-5]\d){2}$/'
];
    if (isset($_POST['name'],$_POST['value'])) {
        $name = $_POST['name'];
        $value = $_POST['value'];
        $ressult = preg_match($pattern[$name], $value);
        echo json_encode($ressult);
    }



