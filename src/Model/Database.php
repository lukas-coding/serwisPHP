<?php

declare(strict_types=1);

namespace App;

use PDO;
use App\StorageException;
use App\ConfigException;
use PDOException;
use Throwable;

class Database
{
    private $conn;

    public function __construct(array $dbConfig)
    {
        $this->dbConfig = $dbConfig;
        try {
            $this->validateDbConfig($dbConfig);
            $this->connectionDb($dbConfig);
        } catch (PDOException $e) {
            throw new StorageException('Błąd!!! Nie można połączyć się z bazą danych.');
        }
    }

    public function newRepair(array $data): void
    {
        try {
            echo "Tworzymy coś tam";
        } catch (Throwable $e) {
            echo "$e";
        }
    }

    private function connectionDb(array $c): void
    {
        $dsn = "mysql:dbname={$c['database']};host={$c['host']}";
        $this->conn = new PDO(
            $dsn,
            $c['user'],
            $c['password']
        );
    }

    private function validateDbConfig(array $c): void
    {
        if (
            empty($c['host'])
            || empty($c['database'])
            || empty($c['user'])
            || empty($c['password'])
        ) {
            throw new ConfigException('Błąd Konfiguracji Serwera');
        }
    }
}
