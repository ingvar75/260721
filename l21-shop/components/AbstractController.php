<?php

namespace components;

use app\views\dto\AbstractViewDTO;

abstract class AbstractController
{
    use ComponentsTrait;

    protected bool $isSecured = true;

    public function __construct()
    {
        if ($this->isSecured && $this->user()->isGuest()) {
            $this->response()->goToAuth();
        }
    }

    protected function render(string $template, ?AbstractViewDTO $variables = null, ?string $layout = null): string
    {
        return $this->template()->render($template, $variables, $layout);
    }
}