<?php

declare(strict_types=1);

namespace App;

class Request
{
    private $get = [];
    private $post = [];

    public function __construct(array $get, array $post)
    {
        $this->get = $get;
        $this->post = $post;
    }

    public function getParam(string $data, $default = null)
    {
        return $this->get[$data] ?? $default;
    }

    public function postParam(string $data, $default = null)
    {
        return $this->post[$data] ?? $default;
    }
}
