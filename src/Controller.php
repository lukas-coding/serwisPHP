<?php

declare(strict_types=1);

namespace App;

use App\View;

require_once("src/View.php");

class Controller
{
    private $postData;
    private $getData;
    private const DEFAULT_ACTION = 'layout';

    public function __construct(array $getData, array $postData)
    {
        $this->postData = $postData;
        $this->getData = $getData;
    }

    public function run(): void
    {
        $page = $this->getData['action'] ?? self::DEFAULT_ACTION;
        $viewParams = [];
        $view = new View;
        $view->renderSite($page, $viewParams, $this->postData);
    }
}
