<?php

namespace components\db;

use components\ComponentsTrait;

class Insert extends AbstractQuery
{
    use ComponentsTrait;

    private array $fields;
    private array $values;

    public function into(string $table): self
    {
        $this->table = $table;
        return $this;
    }

    public function fields(array $fields): self
    {
        $this->fields = $fields;
        return $this;
    }

    public function values(array $values): self
    {
        $this->values = $values;
        return $this;
    }

    public function getQuery(): string
    {
        $fields = '`' . implode('`, `', $this->fields) . '`';
        return "INSERT INTO {$this->getTableName()} ($fields) VALUES {$this->getValuesPart()}";
    }

    private function getValuesPart(): string
    {
        $values = [];
        foreach ($this->values as $index => $row) {
            $data = array_combine($this->fields, $row);
            $rowValues = [];
            foreach ($data as $field => $value) {
                $rowValues[] = ":{$field}_{$index}";
                $this->bindings["{$field}_{$index}"] = $value;
            }
            $values[] = implode(', ', $rowValues);
        }
        return '(' . implode('), (', $values) . ')';
    }
}