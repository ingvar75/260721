<?php

class ClassLoader
{
    private string $baseDir;

    public function __construct(string $baseDir)
    {
        $this->baseDir = $baseDir;
    }

    public function load(string $class): void
    {
        $file = str_replace('\\', '/', $class);
        $rout = "{$this->baseDir}/{$file}.php";
        if (file_exists($rout)) {
            require_once $rout;
        }
    }
}