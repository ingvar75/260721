<?php declare(strict_types=1);

namespace components;

use App;

class Dispatcher
{
    private string $rout;
    private string $delimiter;

    private string $controller;
    private string $action;
    private array $params = [];

    public function __construct(string $rout, string $delimiter = '/')
    {
        $this->rout = $rout;
        $this->delimiter = $delimiter;

        $this->explodeRout();
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    private function explodeRout(): void
    {
        $parts = explode($this->delimiter, $this->rout);
        $parts = array_filter($parts);

        $config = App::get()->getConfig();

        $this->controller = array_shift($parts) ?: $config->get('defaultController');
        $this->action = array_shift($parts) ?: $config->get('defaultAction');
        $this->prepareParams($parts);
    }

    private function prepareParams(array $parts): void
    {
        $chunks = array_chunk($parts, 2);
        foreach ($chunks as $chunk) {
            $this->params[$chunk[0]] = ($chunk[1] ?? null);
        }
    }
}