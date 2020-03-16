<?php


namespace core\web\db;

use stdClass;

class QueryBuilder
{
    private $query;
    private $executor;

    /**
     * QueryBuilder constructor.
     * @param Executor $executor
     */
    public function __construct($executor)
    {
        $this->executor = $executor;
        $this->query = new stdClass();
    }

    public function command($query)
    {
        $this->executor->setQuery($query);
        return $this->executor;
    }
}