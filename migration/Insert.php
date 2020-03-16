<?php


namespace migration;


use core\web\Config;
use core\web\db\DB;
use PDOException;

class Insert
{

    const PATH = __DIR__ . "/insert";

    public function __construct()
    {
        $this->setConfig();
    }

    public function insert()
    {
        $queries = $this->getQueries();

        foreach ($queries as $query):
            try{
                DB::db()->command($query)->execute();
            } catch (PDOException $exception){
                echo $exception->getMessage() . PHP_EOL;
                return;
            }
        endforeach;
        echo 'success' . PHP_EOL;
    }

    private function setConfig()
    {
        $config = $config = include  dirname(__DIR__) .  '/config/config.php';
        Config::config($config);
    }

    private function getQueries()
    {
        $files = $this->getInsertFiles();
        $queries = [];
        foreach ($files as $file):
            $file_content = file_get_contents($file);
            $file_queries = explode(";" . PHP_EOL, $file_content);
            $queries = array_merge($queries, array_filter($file_queries, function ($value){
                return !empty($value);
            }));
        endforeach;

        return $queries;
    }

    private function getInsertFiles()
    {
       return glob( self::PATH . "/*.sql");
    }

}