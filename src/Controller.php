<?php

declare(strict_types=1);

namespace App\Controller;

use App\View;



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
        dump($this->postData);
        $view = new View;
        $view->renderSite($page, $viewParams, $this->postData);
    }
}
