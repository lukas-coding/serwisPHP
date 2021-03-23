<?php

declare(strict_types=1);

namespace App;

use PDO;
use App\StorageException;
use App\ConfigException;
use App\NotFoundException;
use PDOException;


require_once("src/Exceptions/NotFoundException.php");
require_once("src/Exceptions/StorageException.php");

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
            exit();
        }
    }

    public function newRepair(array $data): void
    {
        try {
            $created = date('Y-m-d');
            $query = "INSERT INTO hardware VALUES(NULL,'$data[brand]','$data[type]','$data[datasave]','$data[serialnr]',NULL,NULL,'$created')";
            $this->executeQuery($query);
        } catch (PDOException $e) {
            dump($e);
            exit();
        }
    }

    public function addCustomer(array $data): void
    {
        try {
            if (isset($data['email'])) {
                $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
                if (empty($email)) {
                    exit('cos poszło nie tak niepoprawny email');
                } else {
                    $phone = (int)$data['phone'];
                    $lastId = $this->lastId();
                    $query = "INSERT INTO customer VALUES(NULL,$lastId,'$data[fname]','$data[lname]','$data[email]',$phone)";
                    $this->executeQuery($query);
                }
            }
        } catch (PDOException $e) {
            dump($e);
            exit();
        }
    }

    public function addDescription(array $data): void
    {
        try {
            $id = $this->lastId();
            $query = "UPDATE hardware SET description = '$data[description]', cost = '$data[cost]' WHERE id = $id";
            $this->executeQuery($query);
        } catch (PDOException $e) {
            echo $e;
            exit();
        }
    }

    public function showList(): array
    {
        try {
            $query = "SELECT customer.fname, customer.lname,hardware.id, hardware.brand, hardware.type,hardware.created FROM customer LEFT JOIN hardware ON customer.id_hardware = hardware.id ORDER BY hardware.id DESC";
            $result = $this->conn->quote($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            dump($e);
            exit();
        }
    }

    public function showCustomer(int $id): array
    {
        try {
            $query = "SELECT customer.fname, customer.lname, customer.email, customer.phonenr,hardware.id, hardware.brand, hardware.type, hardware.datasave, hardware.serialnr,hardware.description,hardware.cost, hardware.created FROM customer LEFT JOIN hardware ON customer.id_hardware = hardware.id WHERE id = $id ORDER BY hardware.id DESC";
            $result = $this->conn->quote($query);
            $result = $this->conn->prepare($query);
            $result->execute();
            $customer = $result->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            dump($e);
            exit();
        }

        if (!$customer) {
            throw new NotFoundException('Nie ma takiego klienta');
        }

        return $customer;
    }

    public function saveEdit(array $data, int $id): void
    {

        $phone = (int)$data['phone'];
        try {
            $query = "UPDATE hardware, customer 
            SET hardware.brand = '$data[brand]', hardware.type = '$data[type]', hardware.datasave = '$data[datasave]', 
            hardware.serialnr = '$data[serialnr]', hardware.description = '$data[description]', hardware.cost = '$data[cost]', customer.fname = '$data[fname]', customer.lname = '$data[lname]', customer.email = '$data[email]', customer.phonenr = $phone 
            WHERE hardware.id = customer.id_hardware AND hardware.id = $id";
            $this->executeQuery($query);
        } catch (PDOException $e) {
            dump($data);
            var_dump($id);
            dump($e);
            exit();
        }
    }

    public function deleteRepair(int $id): void
    {
        if (!empty($id)) {
            $query = "DELETE from hardware WHERE id = $id LIMIT 1";
            $this->executeQuery($query);
        } else {
            exit('niepoprawne id');
        }
    }

    private function lastId()
    {
        $lastId = ("SELECT max(id) FROM hardware");
        $result = $this->conn->quote($lastId);
        $result = $this->conn->prepare($lastId);
        $result->execute();
        return (int)$result->fetchColumn();
    }

    private function executeQuery(string $query): void
    {
        $result = $this->conn->quote($query);
        $result = $this->conn->prepare($query);
        $result->execute();
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
