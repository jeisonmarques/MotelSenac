<?php

namespace Connection\Database;

use PDO;

class PdoConnection
{
    /**
     * @var Pdo
     */
    protected $pdo;

    public function __construct() {}

    private function connect()
    {
        try {
			$server = "tcp:v8xjjhajlw.database.windows.net,1433";
			$username = "apl@v8xjjhajlw";
			$password = "Sjm157304@";
			$database = "motelAtVQaSrngqJ";
            $this->pdo = new PDO("sqlsrv:server=$server ; Database = $database", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }

    public function getInstance()
    {
        if (null == $this->pdo) {
            $this->connect();
        }

        return $this->pdo;
    }
}