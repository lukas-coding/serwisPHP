<?php

declare(strict_types=1);

namespace App;

use App\View;
use App\Database;
use App\Request;
use Throwable;
use Mpdf\Mpdf;

require_once("/serwisPHP/vendor/autoload.php");
require_once("src/View.php");
require_once("src/Model/Database.php");
require_once("src/Request.php");

class Controller
{

    private $db;
    private $view;
    private  $req;
    private $mpdf;
    private static $config = [];
    private const DEFAULT_ACTION = 'layout';


    public function __construct(Request $req)
    {
        $this->req = $req;
        $this->db = new Database(self::$config['db']);
        $this->view = new View;
        $this->mpdf = new Mpdf();
    }

    public function run(): void
    {

        $page = $this->action();

        switch ($page) {
            case 'new':
                try {
                    if ($this->req->hasPost()) {
                        $this->db->newRepair($this->req->postParam());
                        header("Location: /?action=description");
                    }
                } catch (Throwable $e) {
                    echo $e;
                }
                break;
            case 'description':
                try {
                    if ($this->req->hasPost()) {
                        $this->db->addDescription($this->req->postParam());
                        header("Location: /?action=addClient");
                    }
                } catch (Throwable $e) {
                    echo $e;
                }
                break;
            case 'addClient':
                try {
                    if ($this->req->hasPost()) {
                        $this->db->addCustomer($this->req->postParam());
                        header("Location: /?action=create");
                    }
                } catch (Throwable $e) {
                    echo $e;
                }
                break;
            case 'show':
                $customerId = (int)$this->req->getParam('id');
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
                $customerId = (int)$this->req->getParam('id');
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
            case 'print':
                ob_start();
                include_once('/serwisPHP/templates/pages/print.php');
                $html = ob_get_clean();
                dump($html);
                $this->mpdf->WriteHTML($html);
                $this->mpdf->Output();
                break;
            default:
                $viewParams = [
                    'client' => $this->db->showList()
                ];
        }

        $this->view->renderSite($page, $viewParams ?? []);
    }

    public function action(): string
    {
        return $this->req->getParam('action', self::DEFAULT_ACTION);
    }

    public static function initConfiguration(array $config)
    {
        self::$config = $config;
    }
}
