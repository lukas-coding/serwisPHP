<?php

declare(strict_types=1);

namespace App;

use App\View;
use App\Database;

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
        $page = $this->getData['action'] ?? self::DEFAULT_ACTION;
        dump($page);
        $viewParams = [];
        $this->view->renderSite($page, $viewParams, $this->postData);


        switch ($page) {
            case 'new':

                if (!empty($this->postData)) {
                    $this->db->newRepair($this->postData);
                    dump($this->postData);
                }
        }
    }

    public static function initConfiguration(array $config)
    {
        self::$config = $config;
    }
}
