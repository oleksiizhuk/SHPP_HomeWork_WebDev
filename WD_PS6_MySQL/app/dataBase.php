<?php

class Dbh
{
    private $serverName;
    private $userName;
    private $password;
    private $dbName;
    private $link;

    function __construct($serverName,$userName,$password,$dbName)
    {
        $this->serverName = $serverName;
        $this->userName = $userName;
        $this->password = $password;
        $this->dbName = $dbName;
    }

    public function connectToDB() {
        $this->link = mysqli_connect($this->serverName,
            $this->userName, $this->password, $this->dbName );
        if (mysqli_connect_errno()) {
            throw new Exception( 'ошибка подключению к базе данных
             ('.mysqli_connect_errno().'): '.mysqli_connect_error());
        }
        $select_db = mysqli::select_db('chat');
        echo "подключенно";
    }

}
