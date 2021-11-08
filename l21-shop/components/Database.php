<?php

namespace components;

use PDO;

class Database
{
    private string $driver;
    private string $host;
    private string $user;
    private string $password;
    private string $dbName;

    private ?PDO $connection = null;

    public function __construct(
        string $driver,
        string $host,
        string $user,
        string $password,
        string $dbName
    ) {
        $this->driver = $driver;
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbName = $dbName;
    }

    public function getConnection(): PDO
    {
        if ($this->connection === null) {
            $this->connection = new PDO(
                "{$this->driver}:host={$this->host};dbname={$this->dbName}",
                $this->user,
                $this->password
            );
        }

        return $this->connection;
    }
}