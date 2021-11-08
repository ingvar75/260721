<?php

namespace components;

use App;
use exceptions\NotFoundException;
use helpers\StringsHelper;

class Router
{
    private Dispatcher $dispatcher;

    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function run(): mixed
    {
        $controller = $this->getController();
        return $this->callAction($controller);
    }

    private function getController(): AbstractController
    {
        $className = $this->dispatcher->getController();
        $class = StringsHelper::camelize($className, '-');
        $class = App::get()->getConfig()->get('controllersNamespace') . '\\' . $class;
        $class .= 'Controller';

        if (!class_exists($class)) {
            throw new NotFoundException("Controller '{$className}' is undefined");
        }

        $controller = new $class();
        if (!$controller instanceof AbstractController) {
            throw new NotFoundException("Controller '{$className}' is invalid");
        }

        return $controller;
    }

    private function callAction(AbstractController $controller): mixed
    {
        $actionName = $this->dispatcher->getAction();
        $action = StringsHelper::camelize($actionName, '-');
        $action = "action{$action}";

        if (!method_exists($controller, $action)) {
            throw new NotFoundException("Action '{$actionName}' is undefined");
        }

        return $controller->{$action}(...$this->dispatcher->getParams());
//        call_user_func_array([$controller, $action], $this->dispatcher->getParams());
    }
}