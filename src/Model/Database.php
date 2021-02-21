<?php

declare(strict_types=1);

namespace App;

use PDO;
use Throwable;
use App\StorageException;
use App\ConfigException;

class Database
{
    private $pdo;
    private $dbConfig;
    // private $conn;



    public function __construct(array $dbConfig)
    {
        $this->dbConfig = $dbConfig;
        try {


            $dsn = "mysql:dbname={$dbConfig['db']['database']};host={$dbConfig['db']['host']}";
            $conn = new PDO(
                $dsn,
                $dbConfig['db']['user'],
                $dbConfig['db']['password']
            );
        } catch (Throwable $e) {

            throw new StorageException('Błąd!!! Nie można połączyć się z bazą danych.');
        }
    }





    // $pdo = new PDO();
}
