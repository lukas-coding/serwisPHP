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

            $created = date('Y-m-d H:i:s');
            $query = "INSERT INTO hardware VALUES(NULL,'$data[brand]','$data[type]','$data[datasave]','$data[serialnr]', '$created')";
            $this->conn->exec($query);
        } catch (PDOException $e) {
            dump($e);
        }
    }

    public function addCustomer(array $data): void
    {
        try {
            $last_id = ("SELECT max(id) FROM hardware");
            $result = $this->conn->prepare($last_id);
            $result->execute();
            $last_id = (int)$result->fetchColumn();

            $query = "INSERT INTO customer VALUES(NULL,$last_id,'$data[fname]','$data[lname]','$data[email]',$data[phone])";
            $this->conn->exec($query);
        } catch (PDOException $e) {
            dump($e);
        }
    }

    private function connectionDb(array $c): void
    {
        $dsn = "mysql:dbname={$c['database']};host={$c['host']}";
        $this->conn = new PDO(
            $dsn,
            $c['user'],
            $c['password'],
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
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
