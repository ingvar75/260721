<?php

use app\views\dto\NotFoundDTO;
use components\Database;
use components\Dispatcher;
use components\LiqPay;
use components\Request;
use components\Response;
use components\Router;
use components\Session;
use components\Storage;
use components\Template;
use components\User;
use exceptions\NotFoundException;

class App
{
    public const DISPATCHER = 'dispatcher';
    public const ROUTER = 'router';
    public const TEMPLATE = 'template';
    public const REQUEST = 'request';
    public const RESPONSE = 'response';
    public const DB = 'database';
    public const SESSION = 'session';
    public const USER = 'user';
    public const LIQ_PAY = 'liqPay';

    private static ?self $instance = null;

    private Storage $config;

    private Storage $components;

    public static function init(array $config): self
    {
        if (self::$instance !== null) {
            throw new RuntimeException('Application is already initialized');
        }

        self::$instance = new self($config);

        $app = self::$instance->setComponents();
        try {
            $answer = $app->getRouter()->run();
            $app->processAnswer($answer);
        } catch (NotFoundException $exception) {
            $app->process404($exception);
        }

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
            ->set(self::DB, new Database(...$this->config->get('components.db')))
            ->set(self::SESSION, new Session())
            ->set(self::USER, new User())
            ->set(self::LIQ_PAY, new LiqPay(...$this->config->get('components.liqPay')));

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

    private function process404(NotFoundException $exception): void
    {
        http_response_code(404);

        /** @var Template $template */
        $template = $this->components->get(self::TEMPLATE);
        $dto = new NotFoundDTO(['message' => $exception->getMessage()]);

        echo $template->render404($dto);
    }

    private function processAnswer(mixed $answer)
    {
        switch (gettype($answer)) {
            case 'string':
            case 'NULL':
                echo $answer;
                break;
            case 'array':
                header('Content-Type: application/json; charset=utf-8');
                echo json_encode($answer);
                break;
            default:
                throw new RuntimeException('Undefined answer type');
        }
    }
}