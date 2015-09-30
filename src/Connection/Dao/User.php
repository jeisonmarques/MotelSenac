<?php

namespace Connection\Dao;

use Connection\Database\PdoConnection;

class User extends PdoConnection
{
    /**
     * @var Pdo
     */
    protected $pdo;

    public function __construct()
    {
        $this->pdo = $this->getInstance();
    }

    public function query($sql)
    {
        $query = $this->pdo->query($sql);

        return $query->fetch(\PDO::FETCH_ASSOC);
    }
	
	public function queryAll($sql)
    {
         $query = $this->pdo->query($sql);

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}