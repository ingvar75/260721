<?php

use components\Database;
use components\Dispatcher;
use components\Request;
use components\Response;
use components\Router;
use components\Storage;
use components\Template;

class App
{
    public const DISPATCHER = 'dispatcher';
    public const ROUTER = 'router';
    public const TEMPLATE = 'template';
    public const REQUEST = 'request';
    public const RESPONSE = 'response';
    public const DB = 'database';

    private static ?self $instance = null;

    private Storage $config;

    private Storage $components;

    public static function init(array $config): self
    {
        if (self::$instance !== null) {
            throw new RuntimeException('Application is already initialized');
        }

        self::$instance = new self($config);

        self::$instance
            ->setComponents()
            ->getRouter()
            ->run();

        return self::$instance;
    }

    public static function get(): self
    {
        if (self::$instance === null) {
            throw new RuntimeException('Application is not initialized yet');
        }

        return self::$instance;
    }

    private function __construct(array $config)
    {
        $this->config = new Storage($config);
        $this->components = new Storage();
    }

    private function __clone()
    {
    }

    public function __wakeup()
    {
        throw new Exception('Cannot unserialize a singleton');
    }

    public function getConfig(): Storage
    {
        return $this->config;
    }

    public function getComponents(): Storage
    {
        return $this->components;
    }

    private function setComponents(): self
    {
        $dispatcher = new Dispatcher($_SERVER['REQUEST_URI']);
        $this->components
            ->set(self::DISPATCHER, $dispatcher)
            ->set(self::ROUTER, new Router($dispatcher))
            ->set(self::TEMPLATE, new Template(...$this->config->get('components.template')))
            ->set(self::REQUEST, new Request())
            ->set(self::RESPONSE, new Response())
            ->set(self::DB, new Database(...$this->config->get('components.db')));

        return $this;
    }

    private function getRouter(): Router
    {
        $router = $this->components->get(self::ROUTER);
        if (!$router instanceof Router) {
            throw new InvalidArgumentException('Router is not initialized yet');
        }

        return $router;
    }
}