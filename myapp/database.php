<?php

namespace Aflo;

trait Database
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host=db;dbname=aflo', 'aflo', 'aflo');
    }
}
