<?php


namespace core\web\db;


use PDO;

class Executor
{
    private $pdo;
    private $query;

    /**
     * Executor constructor.
     * @param PDO $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param mixed $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    public function execute($params = [])
    {
        if(empty($params))
            $result = $this->pdo->query($this->query);
        else
            $result = $this->pdo->prepare($this->query)->execute($params);
        $this->pdo = null;
        return $result;
    }

    public function getAll($mode = PDO::FETCH_ASSOC, $fetch_style = PDO::FETCH_GROUP)
    {
        $result =  $this->pdo->query($this->query, $mode)->fetchAll($fetch_style);
        $this->pdo = null;
        return $result;
    }

    public function get()
    {
        $result =  $this->pdo->query($this->query)->fetch();
        $this->pdo = null;
        return $result;
    }

    public function create()
    {
        return $this->pdo->query($this->query);
    }
}