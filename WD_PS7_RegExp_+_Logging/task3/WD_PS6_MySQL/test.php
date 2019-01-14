<?php

//require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'SingleTonConnectToDB.php';

spl_autoload_register(function ($class) {
    $file = str_replace('\\', '/', $class) . '.php';
    echo $file;
    if (isset($file) && file_exists($file)) {
        require_once $file;
    }
});

$db = \App\SingleTonConnectToDB::getInstance();

echo $db ? 'true' : 'false';
echo '<br />';

//$stmt = $db->getConnection()->prepare("INSERT INTO message (user, message, date) VALUES (:user, :message, :date)");
/*$user = '1234';
$message = 'hellow1';
$date = date('U');*/
/*$data = [
    ':user' => $user,
    ':message' => $message,
    ':date' => $date
];*/

/*spl_autoload_register(function ($name) {
    echo "Хочу загрузить $name.\n";
    throw new Exception("Невозможно загрузить $name.");
});*/

echo '<br />';
echo '<br />';

$lastId = 3;
$sql = 'SELECT * FROM message WHERE date > UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 1 HOUR)) AND id > :lastId';
$sth = $db->getConnection()->prepare($sql);

$paramas = [
    ':lastId' => $lastId
];
$sth->execute($paramas);

$result = $sth->fetchAll();
if (!$result) {
    echo "lol";
    return;
}
echo '<pre>';
foreach ($result as $value) {
    echo $value['date'];
    echo '<br>';
    $value['date'] = date('H:i:s', $value['date']);
    echo $value['date'];
    echo '<br />';
    $arr[] = $value;
}
echo '</pre>';

echo '<pre>';
print_r($arr);
echo '</pre>';


