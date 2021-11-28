<?php

namespace components\db;

class Where
{
    private array $conditions;
    private string $glue;
    private string $queryPart = '';
    private array $bindings = [];

    public function __construct(array $conditions, string $glue)
    {
        $this->conditions = $conditions;
        $this->glue = $glue;
    }

    public function getQueryPart(): string
    {
        if (!$this->queryPart) {
            $this->prepareQueryPart();
        }

        return $this->queryPart;
    }

    public function getBindings(): array
    {
        if (!$this->bindings) {
            $this->prepareQueryPart();
        }

        return $this->bindings;
    }

    private function prepareQueryPart(): void
    {
        $conditions = [];
        foreach ($this->conditions as $field => $value) {
            $alias = "condition_{$field}";
            $conditions[] = "`{$field}` = :{$alias}";
            $this->bindings[$alias] = $value;
        }
        $this->queryPart = ' WHERE ' . implode(" {$this->glue} ", $conditions);
    }
}