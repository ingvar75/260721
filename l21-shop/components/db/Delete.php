<?php declare(strict_types=1);

namespace components\db;

use components\ComponentsTrait;

class Delete extends AbstractQuery
{
    use ComponentsTrait;
    use WhereTrait;
    use LimitsTrait;

    public function from(string $table): self
    {
        $this->table = $table;
        return $this;
    }

    protected function getQuery(): string
    {
        $query = "DELETE FROM {$this->getTableName()}";

        if ($this->where) {
            $query .= $this->where->getQueryPart();
            $this->addBindings($this->where->getBindings());
        }
        $query .= $this->getLimitPart();

        return $query;
    }
}