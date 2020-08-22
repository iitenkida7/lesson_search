<?php

namespace Search;

trait Database
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host=db;dbname=Search', 'Search', 'Search');
    }
}
