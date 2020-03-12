<?php


namespace core\web\db;

use stdClass;

class QueryBuilder
{
    private $query;
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->query = new stdClass();
    }

}