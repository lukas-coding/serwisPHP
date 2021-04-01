<?php

declare(strict_types=1);

namespace App;

use App\StorageException;
use App\ConfigException;
use PDO;
use PDOException;

abstract class AbstractDatabase
{
    protected $conn;

    public function __construct(array $dbConfig)
    {
        $this->dbConfig = $dbConfig;
        try {
            $this->validateDbConfig($dbConfig);
            $this->connectionDb($dbConfig);
        } catch (PDOException $e) {
            throw new StorageException('Nie można połączyć się z bazą danych.');
            exit();
        }
    }

    protected function lastId()
    {
        $lastId = ("SELECT max(id) FROM hardware");
        $result = $this->conn->quote($lastId);
        $result = $this->conn->prepare($lastId);
        $result->execute();
        return (int)$result->fetchColumn();
    }

    protected function executeQuery(string $query): void
    {
        $result = $this->conn->quote($query);
        $result = $this->conn->prepare($query);
        $result->execute();
    }

    private function connectionDb(array $connection): void
    {
        $dsn = "mysql:dbname={$connection['database']};host={$connection['host']}";
        $this->conn = new PDO(
            $dsn,
            $connection['user'],
            $connection['password'],
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    private function validateDbConfig(array $connection): void
    {
        if (
            empty($connection['host'])
            || empty($connection['database'])
            || empty($connection['user'])
            || empty($connection['password'])
        ) {
            throw new ConfigException('Błąd Konfiguracji Serwera');
        }
    }
}
