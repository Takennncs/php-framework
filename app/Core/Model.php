<?php

namespace App\Core;

use PDO;

abstract class Model
{
    protected static string $table;
    protected string $primaryKey = 'id';
    protected array $attributes = [];
    protected array $fillable = [];
    protected array $hidden = [];
    protected array $casts = [];
    
    public function __construct(array $attributes = [])
    {
        $this->fill($attributes);
    }
    
    public function fill(array $attributes): self
    {
        foreach ($attributes as $key => $value) {
            if (in_array($key, $this->fillable) || empty($this->fillable)) {
                $this->setAttribute($key, $value);
            }
        }
        
        return $this;
    }
    
    public function setAttribute(string $key, $value): void
    {
        if (isset($this->casts[$key])) {
            $value = $this->castValue($value, $this->casts[$key]);
        }
        
        $this->attributes[$key] = $value;
    }
    
    public function getAttribute(string $key)
    {
        $value = $this->attributes[$key] ?? null;
        
        if (isset($this->casts[$key])) {
            $value = $this->castValue($value, $this->casts[$key]);
        }
        
        return $value;
    }
    
    protected function castValue($value, string $type)
    {
        return match ($type) {
            'int', 'integer' => (int) $value,
            'float', 'double' => (float) $value,
            'bool', 'boolean' => (bool) $value,
            'string' => (string) $value,
            'array' => json_decode($value, true) ?? [],
            'object' => json_decode($value),
            'date' => $value ? new \DateTime($value) : null,
            default => $value,
        };
    }
    
    public function toArray(): array
    {
        $attributes = $this->attributes;
        
        foreach ($this->hidden as $key) {
            unset($attributes[$key]);
        }
        
        return $attributes;
    }
    
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
    
    public function save(): bool
    {
        $db = Database::getInstance();
        
        if (isset($this->attributes[$this->primaryKey])) {
            // Update
            $id = $this->attributes[$this->primaryKey];
            $data = array_diff_key($this->attributes, [$this->primaryKey => $id]);
            
            $affected = $db->update(
                static::$table,
                $data,
                "{$this->primaryKey} = :id",
                ['id' => $id]
            );
            
            return $affected > 0;
        } else {
            $id = $db->insert(static::$table, $this->attributes);
            
            if ($id) {
                $this->setAttribute($this->primaryKey, $id);
                return true;
            }
            
            return false;
        }
    }
    
    public function delete(): bool
    {
        if (!isset($this->attributes[$this->primaryKey])) {
            return false;
        }
        
        $db = Database::getInstance();
        $affected = $db->delete(
            static::$table,
            "{$this->primaryKey} = :id",
            ['id' => $this->attributes[$this->primaryKey]]
        );
        
        return $affected > 0;
    }
    
    public static function find($id): ?static
    {
        $db = Database::getInstance();
        $result = $db->selectOne(
            "SELECT * FROM " . static::$table . " WHERE id = :id",
            ['id' => $id]
        );
        
        if ($result) {
            return new static((array) $result);
        }
        
        return null;
    }
    
    public static function all(): array
    {
        $db = Database::getInstance();
        $results = $db->select("SELECT * FROM " . static::$table);
        
        return array_map(function($result) {
            return new static((array) $result);
        }, $results);
    }
    
    public static function where(string $column, string $operator, $value): QueryBuilder
    {
        return (new QueryBuilder(static::class))->where($column, $operator, $value);
    }
    
    public static function query(): QueryBuilder
    {
        return new QueryBuilder(static::class);
    }
}