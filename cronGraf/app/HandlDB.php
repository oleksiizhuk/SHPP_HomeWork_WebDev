<?php
/**
 * Created by PhpStorm.
 * User: Oleks
 * Date: 15.01.2019
 * Time: 22:01
 */

namespace App;


class HandlDB
{
    private $connect;
    private $pathApi = 'https://forex.1forge.com/1.0.3/quotes?pairs=BTCUSD,DSHUSD,LTCUSD,ETHUSD,XRPUSD,BCHUSD,ZECUSD&api_key=jA6FgDfjhVFbN0V5Gr9p6Jq9Bt3Tm7i7';

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function addContent()
    {
        $result = json_decode(@file_get_contents($this->pathApi));

        foreach ($result as $key => $value) {
            $array = (array)$value;
//          echo implode(",", $arrayKeys);
            $data = [':symbol' => $array['symbol'], ':bid' => $array['bid'], ':ask' => $array['ask'], ':price' => $array['price'], ':date' => $array['timestamp']];
            $sql = 'INSERT INTO cryptocurrency (symbol, bid, ask, price, date) VALUES (:symbol, :bid, :ask, :price, :date)';
            $sth = $this->connect->prepare($sql);
            $sth->execute($data);
        }
    }

    public function getLastContent()
    {
        $sql = 'SELECT symbol, bid, ask, price FROM cryptocurrency ORDER BY id DESC LIMIT 6';
        $sth = $this->connect->prepare($sql);
        $sth->execute();
        $resultSql = $sth->fetchAll();
        echo json_encode($resultSql);
    }

    public function getContent($argument, $date)
    {
        $sql = 'SELECT * FROM cryptocurrency WHERE date > UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL :date MINUTE )) AND symbol = :argument';

        $params = [':date' => $date, ':argument' => $argument];
        $sth = $this->connect->prepare($sql);

        $sth->execute($params);

        $resultSql = $sth->fetchAll();
        echo json_encode($resultSql);
        exit();


//        echo '<pre>';
//
//        foreach ($resultSql as $value) {
//
//            print_r($value);
//        }
//        echo '</pre>';
    }

}