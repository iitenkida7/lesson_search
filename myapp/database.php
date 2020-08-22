<?php

namespace Search;

trait Database
{
    protected $pdo;

    public function __construct()
    {
        // TODO Pass ベタ書きなのでdotEnv あたり使う
        $this->pdo = new \PDO('mysql:host=db;dbname=Search', 'Search', 'Search');
    }
}
