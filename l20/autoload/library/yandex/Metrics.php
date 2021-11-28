<?php

namespace library\yandex;

use library\AbstractMetrics;

class Metrics extends AbstractMetrics
{
    public function getData(): array
    {
        return [
            'provider' => 'Yandex',
            'metrics' => [9, 8, 7],
        ];
    }
}