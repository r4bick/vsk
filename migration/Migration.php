<?php


namespace migration;


use core\web\Config;
use core\web\db\DB;
use PDO;
use PDOException;

class Migration
{

    const PATH = __DIR__ . "/sql";
    private $tableNames = [];

    public function __construct()
    {
        $this->setConfig();
        $this->tableNames = $this->getTableNames();
    }

    public function migrate()
    {
        $files = $this->getMigrationFiles();

        if(empty($files)){
            echo 'Irrelevant migrations' . PHP_EOL;
            return;
        }

        foreach ($files as $file):
            try {
                $query = $this->getQuery($file);
                DB::db()->command($query)->execute();
                $tableName = $this->getTableName($file);
                $this->updateMigrationTable($tableName);
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

    private function getQuery($file)
    {
        return file_get_contents($file);
    }

    private function getTableNames()
    {
        if($this->isExistMigrationTable()):
            $query  = "SELECT name FROM migration";
            return DB::db()->command($query)->getAll(PDO::FETCH_ASSOC, null);
        endif;

        return [];
    }

    private function isExistMigrationTable()
    {
        $query = "SELECT table_name 
                FROM information_schema.tables
                WHERE table_schema='public'
                AND table_type='BASE TABLE'
                AND table_name='migration'";
        return !empty(DB::db()->command($query)->get());
    }

    private function getMigrationFiles()
    {
        $files = glob( self::PATH . "/*.sql");
        $tableNames = $this->tableNames;

        $file_paths = [];
        foreach ($tableNames as $tableName) {
            array_push($file_paths, self::PATH . '/'. $tableName['name'] . '.sql');
        }

        return array_diff($files, $file_paths);
    }

    private function updateMigrationTable($tableName)
    {
        $query = "INSERT INTO migration(name, created_at) VALUES (?, ?)";
        DB::db()->command($query)->execute([$tableName, time()]);
        echo $tableName . ' created successfully' . PHP_EOL;
    }

    private function getTableName($file)
    {
        $path = explode('/', $file);
        $tableName = explode('.', end($path));
        return $tableName[0];
    }


}