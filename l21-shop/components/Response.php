<?php

namespace components;

class Response
{
    use ComponentsTrait;

    public function redirect(string $url, int $status = 301, bool $terminate = true): void
    {
        header("Location: {$url}", true, $status);
        if ($terminate) {
            exit;
        }
    }

    public function goToAuth(): void
    {
        $this->redirect($this->config()->get('authPage'));
    }
}