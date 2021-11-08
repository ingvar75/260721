<?php declare(strict_types=1);

namespace components\db;

use components\ComponentsTrait;

class Update extends AbstractQuery
{
    use ComponentsTrait;
    use WhereTrait;
    use LimitsTrait;

    private array $fields;

    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function set(array $fields): self
    {
        $this->fields = $fields;
        return $this;
    }

    public function getQuery(): string
    {
        $query = "UPDATE {$this->getTableName()} SET {$this->getFieldsPart()}";
        if ($this->where) {
            $query .= $this->where->getQueryPart();
            $this->addBindings($this->where->getBindings());
        }
        $query .= $this->getLimitPart();

        return $query;
    }

    private function getFieldsPart(): string
    {
        $fields = [];
        foreach ($this->fields as $field => $value) {
            $alias = "field_{$field}";
            $fields[] = "`{$field}` = :{$alias}";
            $this->bindings[$alias] = $value;
        }
        return implode(', ', $fields);
    }
}