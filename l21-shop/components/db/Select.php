<?php declare(strict_types=1);

namespace components\db;

use PDO;
use components\ComponentsTrait;

class Select extends AbstractQuery
{
    use ComponentsTrait;
    use WhereTrait;
    use LimitsTrait;

    private array $fields;
    private array $order = [];
    private ?int $offset = null;

    public function __construct(array|string|Expression $fields)
    {
        $this->fields = is_array($fields) ? $fields : [$fields];
    }

    public function from(string $table): self
    {
        $this->table = $table;
        return $this;
    }

    public function orderBy(array $order): self
    {
        $this->order = $order;
        return $this;
    }

    public function offset(int $offset): self
    {
        $this->offset = $offset;
        return $this;
    }

    public function one(int $fetch = PDO::FETCH_ASSOC): ?array
    {
        $this->execute();
        return $this->stmt->fetch($fetch) ?: null;
    }

    public function all(int $fetch = PDO::FETCH_ASSOC): array
    {
        $this->execute();
        return $this->stmt->fetchAll($fetch) ?: [];
    }

    public function count(): int
    {
        $sql = "SELECT COUNT(1) AS count FROM ({$this->getQuery()}) tmp";
        $stmt = $this->db()->getConnection()->prepare($sql);
        $stmt->execute($this->bindings);

        return (int)$stmt->fetch(PDO::FETCH_ASSOC)['count'];
    }

    public function scalar(?string $column = null): array
    {
        $result = [];
        foreach ($this->all() as $row) {
            $result[] = $column ? $row[$column] : current($row);
        }

        return $result;
    }

    public function getQuery(): string
    {
        $query = "SELECT {$this->getFieldsPart()} FROM {$this->getTableName()}";
        if ($this->where) {
            $query .= $this->where->getQueryPart();
            $this->addBindings($this->where->getBindings());
        }

        $query .= $this->getOrderPart();
        $query .= $this->getLimitPart();
        $query .= $this->getOffsetPart();

        return $query;
    }

    private function getFieldsPart(): string
    {
        $fields = [];
        foreach ($this->fields as $field) {
            if ($field === '*') {
                $fields[] = $field;
            } elseif ($field instanceof Expression) {
                $fields[] = $field->getExpression();
            } else {
                $fields[] = "`{$field}`";
            }
        }

        return implode(', ', $fields);
    }

    private function getOrderPart(): string
    {
        if (empty($this->order)) {
            return '';
        }

        $order = [];
        foreach ($this->order as $field => $direction) {
            $order[] = "`{$field}` " . ($direction === SORT_ASC ? 'ASC' : 'DESC');
        }
        return ' ORDER BY ' . implode(', ', $order);
    }

    private function getOffsetPart(): string
    {
        if ($this->offset === null) {
            return '';
        }

        return " OFFSET {$this->offset}";
    }
}