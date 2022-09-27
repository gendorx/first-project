<?php

class Database
{
    public static $db;

    public static function connect($user, $password, $host, $db_name)
    {
        $dsn = 'mysql:dbname=' . $db_name . ';charset=utf8;host=' . $host;
        self::$db = new PDO($dsn, $user, $password);
    }
}
