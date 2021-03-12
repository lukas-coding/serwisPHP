<?php

declare(strict_types=1);

namespace App;

class View
{

    public function renderSite(string $page, array $viewParams): void
    {
        require_once("templates/pages/layout.php");
    }
}
