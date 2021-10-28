<?php

namespace components;

use App;
use app\views\dto\AbstractViewDTO;

abstract class AbstractController
{
    use ComponentsTrait;

    protected bool $isSecured = false;

    public function __construct()
    {
        $isGuest = true;
        if ($this->isSecured && $isGuest) {
            $this->response()->redirect($this->config()->get('authPage'));
        }
    }

    protected function render(string $template, ?AbstractViewDTO $variables = null, ?string $layout = null): string
    {
        return $this->template()->render($template, $variables, $layout);
    }
}