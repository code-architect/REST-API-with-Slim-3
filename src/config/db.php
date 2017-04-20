<?php

class DB
{
    private static $dbHost = 'localhost';
    private static $dbUser = 'root';
    private static $dbPassword = '';
    private static $dbName = 'slim_api';


    //connect
    public static function connect()
    {
        $mysql_conn_str = "mysql:host=".self::$dbHost.";dbname=".self::$dbName.";";
        $dbConn = new PDO($mysql_conn_str, static::$dbUser, static::$dbPassword);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConn;
    }






}