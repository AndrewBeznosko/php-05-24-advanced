<?php

namespace Core\Traits;

use PDO;

trait Queryable
{
    static protected string|null $tableName = null;
    static public string $query = '';

    protected array $commands = [];

    static public function select(array $column = ['*']): static
    {
        static::resetQuery();
        $obj = new static;
        $obj->commands[] = 'select';

        static::$query = "SELECT " . implode(', ', $column) . " FROM " . static::$tableName;

        return $obj;
    }

    static protected function resetQuery(): void
    {
        static::$query = '';
    }

    public function get(): array
    {


        return db()->query(static::$query)->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    static public function all(array $column = ['*']): array
    {
        return static::select($column)->get();
    }

    static public function find(int $id, array $column = ['*']): static
    {
        $query = db()->prepare("SELECT " . implode(', ', $column) . " FROM " . static::$tableName . " WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();

        return $query->fetchObject(static::class);
    }
}