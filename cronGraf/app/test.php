<?php


class test
{
    private $connect;
    private $pathApi = 'https://forex.1forge.com/1.0.3/quotes?pairs=BTCUSD,DSHUSD,LTCUSD,ETHUSD,XRPUSD,BCHUSD,ZECUSD&api_key=jA6FgDfjhVFbN0V5Gr9p6Jq9Bt3Tm7i7';

    public function __construct()
    {
        $config = require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'configMysql.php';
        $dsn = 'mysql:host=' . $config['db_Host'] . ';dbname=' . $config['db_Name'] . ';charset=' . $config['charset'];
        $options = [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC];

        try {
            $connect = new \PDO($dsn, $config['db_User'], $config['db_Password'], $options);
        } catch (\PDOException $e) {
            die('Database Connection failed: ' . $e->getMessage());
        }
        $this->connect = $connect;
    }

    public function addTest()
    {

        $sql = 'INSERT INTO test (id, word) VALUES (NULL, :symbol)';

        $symbol = "test";
        $sth = $this->connect->prepare($sql);

        $params = [':symbol' => $symbol];

        $sth->execute($params);
    }

    public function getContent($argument, $date)
    {
        $sql = 'SELECT * FROM cryptocurrency WHERE date > UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL :date MINUTE )) AND symbol = :argument';

        $params = [':date' => $date, ':argument' => $argument];
        $sth = $this->connect->prepare($sql);

        $sth->execute($params);

        print_r($resultSql = $sth->fetchAll());
        exit();

        //var_dump($resultSql);
//        echo '<pre>';
//
//        foreach ($resultSql as $value) {
//
//            print_r($value);
//        }
//        echo '</pre>';
    }

    public function addContent()
    {
        $result = json_decode(@file_get_contents($this->pathApi));
        var_dump($result);
        //echo $result;

        foreach ($result as $key => $value) {
            $array = (array)$value;
//            echo implode(",", $arrayKeys);
            $data = [':symbol' => $array['symbol'], ':bid' => $array['bid'], ':ask' => $array['ask'], ':price' => $array['price'], ':date' => $array['timestamp']];
            $sql = 'INSERT INTO cryptocurrency (symbol, bid, ask, price, date) VALUES (:symbol, :bid, :ask, :price, :date)';
            $sth = $this->connect->prepare($sql);
            $sth->execute($data);
        }
//        echo '<pre>';
//        print_r($result);
//        echo '</pre>';
    }
}

if (isset($_POST['time'])) {
    $testing = new test();
    //echo $_POST['value'];
   // echo $_POST['time'];
    $testing->getContent($_POST['value'], $_POST['time']);
}
/*else {
    $testing = new test();
    $testing->addContent();
    $arg = 'DSHUSD';
    $time = '60';*/


// $testing->getContent($arg, $time);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form id="a">
    <input type="submit">
    <input type="range" min="0" max="60" step="1" name="time">
    <select name="value">
        <option>BTCUSD</option>
        <option>DSHUSD</option>
        <option>LTCUSD</option>
        <option>ETHUSD</option>
        <option>XRPUSD</option>
        <option>BCHUSD</option>
    </select>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../public/js/index.js"></script>
</body>
</html>


