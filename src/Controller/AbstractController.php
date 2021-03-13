<?php

declare(strict_types=1);

namespace App;

require_once("/serwisPHP/vendor/autoload.php");
require_once("src/View.php");
require_once("src/Model/Database.php");
require_once("src/Request.php");

use Mpdf\Mpdf;
use App\View;
use App\Database;
use App\Request;

abstract class AbstractController
{

    protected $req;
    protected $db;
    protected $view;
    protected $mpdf;
    protected static $config = [];
    protected const DEFAULT_ACTION = 'layout';

    public function __construct(Request $req)
    {
        $this->req = $req;

        if (empty(self::$config['db'])) {
            throw new ConfigException('Błąd konfiguracji');
            exit();
        }
        $this->db = new Database(self::$config['db']);
        $this->view = new View;
        $this->mpdf = new Mpdf();
    }

    public function run(): void
    {

        $action = $this->action() . 'Action';
        if (!method_exists($this, $action)) {
            $action = self::DEFAULT_ACTION . 'Action';
        }

        $this->$action();
    }

    private function action(): string
    {
        return $this->req->getParam('action', self::DEFAULT_ACTION);
    }

    public static function initConfiguration(array $config)
    {
        self::$config = $config;
    }
}
