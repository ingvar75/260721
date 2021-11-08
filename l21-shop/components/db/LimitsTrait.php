<?php

namespace components\db;

trait LimitsTrait
{
    private ?int $limit = null;

    public function limit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    private function getLimitPart(): string
    {
        return $this->limit ? " LIMIT {$this->limit}" : '';
    }
}