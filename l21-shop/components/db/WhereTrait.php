<?php

namespace components\db;

trait WhereTrait
{
    private ?Where $where = null;

    public function where(array $conditions, string $glue = 'AND'): self
    {
        if (empty($conditions)) {
            return $this;
        }

        $this->where = new Where($conditions, $glue);
        return $this;
    }
}