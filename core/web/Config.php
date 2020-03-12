<?php

namespace core\web;


class Config
{
    private static $class;
    private static $config = [];

    private function __construct() { }

    private function __clone() { }

    public static function config($config = [])
    {
        self::$config = $config;
    }

    public static function getInstance()
    {
        if(!isset(self::$class)){
            self::$class = new static();
        }

        return self::$class;
    }

    public static function db()
    {
        return isset(self::$config['db']) ? self::$config['db'] : null;
    }

}