<?php

namespace core\web\db;


use core\web\Config;
use PDO;

class DB
{
    private static function connect($config)
    {
        $dsn = $config['dsn'];

        return new PDO($dsn, $username = $config['username'], $password = $config['password']);
    }

    /**
     * @param array $config
     * @return QueryBuilder
     */
    public static function db($config = [])
    {
        if(empty($config))
            $config = Config::db();

        return new QueryBuilder(self::connect($config));
    }
}