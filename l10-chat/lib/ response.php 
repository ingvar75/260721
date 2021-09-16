<?php

function redirect(string $url, int $status = 301, bool $terminate = true): void
{
    header("Location: {$url}", true, $status);
    if ($terminate) {
        exit;
    }
}