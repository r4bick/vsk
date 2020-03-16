<?php

namespace core\web\db;


use core\web\Config;
use PDO;

class DB
{
    private static function connect($config)
    {
        $dsn = $config['dsn'];
        $pdo =new PDO($dsn, $username = $config['username'], $password = $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    /**
     * @param array $config
     * @return QueryBuilder
     */
    public static function db($config = [])
    {
        if(empty($config))
            $config = Config::db();

        $executor = new Executor(self::connect($config));
        return new QueryBuilder($executor);
    }
}