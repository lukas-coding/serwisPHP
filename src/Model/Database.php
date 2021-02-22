<?php

declare(strict_types=1);

namespace App;

use PDO;
use App\StorageException;
use App\ConfigException;
use PDOException;

class Database
{

    public function __construct(array $dbConfig)
    {
        $this->dbConfig = $dbConfig;


        dump($dbConfig);

        try {
            $this->validateDbConfig($dbConfig);
            $dsn = "mysql:dbname={$dbConfig['db']['database']};host={$dbConfig['db']['host']}";
            $conn = new PDO(
                $dsn,
                $dbConfig['db']['user'],
                $dbConfig['db']['password']
            );
        } catch (PDOException $e) {
            throw new StorageException('Błąd!!! Nie można połączyć się z bazą danych.');
        }
    }

    private function validateDbConfig(array $c): void
    {
        if (
            empty($c['db']['host'])
            || empty($c['db']['database'])
            || empty($c['db']['user'])
            || empty($c['db']['password'])
        ) {
            throw new ConfigException('Błąd Konfiguracji Serwera');
        }
    }
}
