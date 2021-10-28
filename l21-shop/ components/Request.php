<?php

namespace components;

class Request
{
    private Storage $get;
    private Storage $post;

    public function __construct()
    {
        $this->get = new Storage($_GET);
        $this->post = new Storage($_POST);
    }

    public function isPost(): bool
    {
        return strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
    }

    public function get(): Storage
    {
        return $this->get;
    }

    public function post(): Storage
    {
        return $this->post;
    }
}