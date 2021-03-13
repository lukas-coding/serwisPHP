<?php

declare(strict_types=1);

namespace App;

class View
{

    public function renderSite(string $page, ?array $viewParams): void
    {
        $viewParams = $this->escapeData($viewParams);
        require_once("templates/pages/layout.php");
    }

    private function escapeData(array $params): array
    {
        $clearParams = [];

        foreach ($params as $key =>  $param) {
            if (is_array($param)) {
                $clearParams[$key] = $this->escapeData($param);
            } else if ($param) {
                $clearParams[$key] = htmlentities($param);
            } else {
                $clearParams[$key] = $param;
            }
        }
        return $clearParams;
    }
}
