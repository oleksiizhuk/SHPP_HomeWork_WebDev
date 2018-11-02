<?php /** @noinspection PhpIncludeInspection */
/*if ($_SERVER['REQUEST_METHOD'] !== 'POST' ) {
    header("location:index.php"); 
}*/
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

dirname('CONFIG_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR);
$config = require_once CONFIG_PATH . 'config.php';
$configDB = require_once CONFIG_PATH . 'configDataBase.php';

require_once $config['dataBase'];
//$login = $_POST['login'];
//$password = $_POST['password'];

var_dump($config);

function __autoload($className) {
    $classPeices = explode("\\", $className);
}

try {
    $DB = new Dbh(configDB['localhost'], configDB['root'], configDB['password'], configDB['dbName']);
} catch(Exception $exception){
    getError($exception->getMessage());
}




function getError($error) {
    $_SESSION["error"] = $error;
    header("location:index.php");
}


return;



$link = mysqli_connect(LOCALHOST, USER, PASSWORD, DATABASE);
if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql_search = "SELECT name, password FROM user WHERE name = 'admin21'";
$test = mysqli_query($link, $sql_search);
$test = mysqli_query($link, $sql_search);
$row = mysqli_fetch_array($test, MYSQLI_ASSOC);
if ($row){

    //    $row = mysqli_fetch_all($test, MYSQLI_ASSOC);
    //    foreach ($row as $column => $value) {
    //        //echo $column . " = " . $value;
    //        printf("%s (%s)\n", $value['USER_NAME'], $value['USER_PASSWORD']);
    //        echo "<br />";
    //    }
    printf("%s (%s)\n", $row['name'], $row['password']);
} else {
    $test1 = "INSERT INTO user (name, password) VALUES ('admin21', '123456')";
    mysqli_query($link, $test1);
}


//$row = mysqli_fetch_all($test, MYSQLI_ASSOC);

//    foreach ($row as $column => $value) {
//    printf("%s (%s)\n", $value['USER_NAME'], $value['USER_PASSWORD']);
//    echo "<br />";
