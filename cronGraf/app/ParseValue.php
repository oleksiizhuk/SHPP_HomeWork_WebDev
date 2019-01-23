<?php
/**
 * Created by PhpStorm.
 *  * User: Aleksandr Zavyalov
 * Date: 1/21/2019
 * Time: 10:38 PM
 */

namespace app;

use core\Database;

class ParseValue extends Database
{

    private $pathApi =
        'https://forex.1forge.com/1.0.3/quotes?pairs=BTCUSD,DSHUSD,LTCUSD,ETHUSD,XRPUSD,BCHUSD,ZECUSD&api_key=jA6FgDfjhVFbN0V5Gr9p6Jq9Bt3Tm7i7';

    public function addContent()
    {
        $result = json_decode(@file_get_contents($this->pathApi));
        foreach ($result as $key => $value) {
            $array = (array)$value;
            $data = [':symbol' => $array['symbol'], ':bid' => $array['bid'], ':ask' => $array['ask'], ':price' => $array['price'], ':date' => $array['timestamp']];
            $sql = 'INSERT INTO cryptocurrency (symbol, bid, ask, price, date) VALUES (:symbol, :bid, :ask, :price, :date)';
            parent::execute($sql, $data);
        }
    }

}