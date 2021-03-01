<?php

declare(strict_types=1);

namespace App;

use PDO;
use App\StorageException;
use App\ConfigException;
use PDOException;

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

            if (isset($data['email'])) {
                $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
                var_dump($email);
                if (empty($email)) {
                    $_SESSION['given_mail'] = $data['email'];
                    dump($data['email']);
                    header('Location: /?action=addClient');
                    exit('cos poszło nie tak niepoprawny email');
                } else {
                    $lastId = $this->lastId();
                    $query = "INSERT INTO customer VALUES(NULL,$lastId,'$data[fname]','$data[lname]','$data[email]',$data[phone])";
                    $result = $this->conn->prepare($query);
                    $result->execute();
                }
            }
        } catch (PDOException $e) {
            dump($e);
        }
    }

    public function showList(): array
    {
        try {
            $query = "SELECT customer.fname, customer.lname, customer.email, customer.phonenr,hardware.id, hardware.brand, hardware.type, hardware.datasave, hardware.serialnr, hardware.created FROM customer LEFT JOIN hardware ON customer.id_hardware = hardware.id ORDER BY hardware.id DESC";
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            dump($e);
        }
    }

    private function lastId()
    {
        $last_id = ("SELECT max(id) FROM hardware");
        $result = $this->conn->prepare($last_id);
        $result->execute();
        return (int)$result->fetchColumn();
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
