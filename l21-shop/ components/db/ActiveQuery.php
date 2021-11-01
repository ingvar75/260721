<?php

namespace components\db;

use components\ComponentsTrait;
use InvalidArgumentException;
use PDO;
use RuntimeException;

abstract class ActiveQuery
{
    use ComponentsTrait;

    private array $fields;
    private array $oldFields;
    private string $primaryKey;
    private bool $isNew = true;

    public function __construct()
    {
        $this->setupFields();
        $this->setupPrimaryKey();
    }

    abstract public function tableName(): string;

    public static function findOne(array $conditions = []): ?static
    {
        $object = new static();
        $data = (new Select('*'))
            ->from($object->tableName())
            ->where($conditions)
            ->one();

        if (!$data) {
            return null;
        }

        $object->load($data);

        return $object;
    }

    public static function findAll(array $conditions = []): array
    {
        $object = new static();
        $data = (new Select('*'))
            ->from($object->tableName())
            ->where($conditions)
            ->all();

        foreach ($data as &$row) {
            $object = new static();
            $object->load($row);
            $row = $object;
        }
        unset($row);

        return $data;
    }

    public function save(): bool
    {
        $result = $this->isNew ? $this->insert() : $this->update();

        if ($result) {
            $this->refresh();
        }

        return $result;
    }

    private function update(): bool
    {
        $dataToUpdate = array_diff($this->fields, $this->oldFields);
        if (empty($dataToUpdate)) {
            return true;
        }

        return (new Update($this->tableName()))
            ->set($dataToUpdate)
            ->where([$this->primaryKey => $this->oldFields[$this->primaryKey]])
            ->limit(1)
            ->execute();
    }

    public function insert(): bool
    {
        $dataToInsert = array_filter($this->fields);
        if (empty($dataToInsert)) {
            return false;
        }

        $result = (new Insert())
            ->into($this->tableName())
            ->fields(array_keys($dataToInsert))
            ->values([
                array_values($dataToInsert)
            ])
            ->execute();

        if ($result) {
            $lastInsert = (new Select(new Expression('LAST_INSERT_ID() AS id')))
                ->from($this->tableName())
                ->one();
            $this->{$this->primaryKey} = $lastInsert['id'];
        }

        return $result;
    }

    private function refresh(): void
    {
        $data = (new Select('*'))
            ->from($this->tableName())
            ->where([$this->primaryKey => $this->{$this->primaryKey}])
            ->one();
        $this->load($data);
    }

    private function load(array $data): void
    {
        foreach ($data as $column => $value) {
            $this->{$column} = $value;
            $this->oldFields[$column] = $value;
        }
        $this->isNew = false;
    }

    private function setupFields(): void
    {
        $columns = (new Select(['COLUMN_NAME']))
            ->from('INFORMATION_SCHEMA.COLUMNS')
            ->where([
                'TABLE_SCHEMA' => $this->config()->get('components.db.dbName'),
                'TABLE_NAME' => $this->tableName(),
            ])
            ->orderBy(['ORDINAL_POSITION' => SORT_ASC])
            ->scalar();

        $this->fields = array_combine(
            $columns,
            array_fill(0, count($columns), null)
        );
        $this->oldFields = $this->fields;
    }

    private function setupPrimaryKey(): void
    {
        $sql = "SHOW KEYS FROM {$this->tableName()} WHERE Key_name = 'PRIMARY'";
        $db = $this->db()->getConnection();
        $stmt = $db->query($sql);
        $data = current($stmt->fetchAll(PDO::FETCH_ASSOC));
        if (empty($data)) {
            throw new RuntimeException("Table '{$this->tableName()}' has no primary key");
        }

        $this->primaryKey = $data['Column_name'];
    }

    public function __isset(string $field): bool
    {
        return array_key_exists($field, $this->fields);
    }

    public function __get(string $field): mixed
    {
        $this->checkField($field);
        return $this->fields[$field];
    }

    public function __set(string $field, mixed $value): void
    {
        $this->checkField($field);
        $this->fields[$field] = $value;
    }

    private function checkField(string $field): void
    {
        if (!isset($this->{$field})) {
            throw new InvalidArgumentException("Field {$field} is not exists in " . static::class);
        }
    }
}