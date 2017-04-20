<?php

class DB
{
    private $dbHost = 'localhost';
    private $dbUser = 'root';
    private $dbPassword = '';
    private $dbName = 'slim_api';


    //connect
    public function connect()
    {
        $mysql_conn_str = "mysql:host=$this->dbHost;dbname=$this->dbName;";
        $dbConn = new PDO($mysql_conn_str, $this->dbUser, $this->dbPassword);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConn;
    }






}