<?php

declare(strict_types=1);

namespace App;

use App\View;
use App\Database;
use Throwable;

require_once("src/View.php");
require_once("src/Model/Database.php");

class Controller
{
    private $postData;
    private $getData;
    private $db;
    private $view;
    private static $config = [];
    private const DEFAULT_ACTION = 'layout';


    public function __construct(array $getData, array $postData)
    {
        $this->postData = $postData;
        $this->getData = $getData;
        $this->db = new Database(self::$config['db']);
        $this->view = new View;
    }

    public function run(): void
    {

        $page = $this->action();

        switch ($page) {
            case 'new':
                try {
                    if (!empty($this->postData)) {
                        $this->db->newRepair($this->postData);
                        header("Location: /?action=description");
                    }
                } catch (Throwable $e) {
                    echo $e;
                }
                break;
            case 'description':
                try {
                    if (!empty($this->postData)) {
                        $this->db->addDescription($this->postData);
                        header("Location: /?action=addClient");
                    }
                } catch (Throwable $e) {
                    echo $e;
                }
                break;
            case 'addClient':
                try {
                    if (!empty($this->postData)) {
                        $this->db->addCustomer($this->postData);
                        header("Location: /?action=create");
                    }
                } catch (Throwable $e) {
                    echo $e;
                }
                break;
            case 'show':
                $customerId = (int)$this->getData['id'];
                try {
                    $this->db->showCustomer($customerId);
                    $viewParams = [
                        'customer' => $this->db->showCustomer($customerId)
                    ];
                } catch (NotFoundException $e) {
                    echo "<h1>" . $e->getMessage() . "</h1>";
                    exit();
                }
                break;
            case 'edit':
                $customerId = (int)$this->getData['id'];
                try {
                    $this->db->showCustomer($customerId);
                    $viewParams = [
                        'customer' => $this->db->showCustomer($customerId)
                    ];
                } catch (NotFoundException $e) {
                    echo "<h1>" . $e->getMessage() . "</h1>";
                    exit();
                }
                break;
            default:
                $viewParams = [
                    'client' => $this->db->showList()
                ];
        }

        $this->view->renderSite($page, $viewParams ?? [], $this->postData);
    }

    public function action(): string
    {
        return $this->getData['action'] ?? self::DEFAULT_ACTION;
    }

    public static function initConfiguration(array $config)
    {
        self::$config = $config;
    }
}
