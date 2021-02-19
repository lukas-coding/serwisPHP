<?php

declare(strict_types=1);

namespace App\Controller;

use App\View;
use App\Database;


require_once("src/Model/Database.php");



class Controller
{
    private $postData;
    private $getData;
    private static $dbConfig = [];
    private const DEFAULT_ACTION = 'layout';

    public static function initDbConfig(array $dbConfig): void
    {
        self::$dbConfig = $dbConfig;
    }

    public function __construct(array $getData, array $postData)
    {
        $this->postData = $postData;
        $this->getData = $getData;

        dump(self::$dbConfig);

        $db = new Database(self::$dbConfig['db']);
    }


    public function run(): void
    {
        $page = $this->getData['action'] ?? self::DEFAULT_ACTION;
        $viewParams = [];
        $view = new View;
        $view->renderSite($page, $viewParams, $this->postData);
    }
}
