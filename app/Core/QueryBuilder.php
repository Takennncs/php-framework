<?php

namespace App\Core;

class QueryBuilder
{
    protected string $modelClass;
    protected string $table;
    protected array $wheres = [];
    protected array $orders = [];
    protected ?int $limit = null;
    protected ?int $offset = null;
    protected array $params = [];
    
    public function __construct(string $modelClass)
    {
        $this->modelClass = $modelClass;
        $this->table = $modelClass::$table;
    }
    
    public function where(string $column, string $operator, $value): self
    {
        $this->wheres[] = [
            'type' => 'and',
            'column' => $column,
            'operator' => $operator,
            'value' => $value
        ];
        
        $this->params[] = $value;
        
        return $this;
    }
    
    public function orWhere(string $column, string $operator, $value): self
    {
        $this->wheres[] = [
            'type' => 'or',
            'column' => $column,
            'operator' => $operator,
            'value' => $value
        ];
        
        $this->params[] = $value;
        
        return $this;
    }
    
    public function orderBy(string $column, string $direction = 'asc'): self
    {
        $this->orders[] = "$column $direction";
        return $this;
    }
    
    public function limit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }
    
    public function offset(int $offset): self
    {
        $this->offset = $offset;
        return $this;
    }
    
    public function get(): array
    {
        $sql = $this->buildSelect();
        
        $db = Database::getInstance();
        $results = $db->select($sql, $this->params);
        
        return array_map(function($result) {
            return new $this->modelClass((array) $result);
        }, $results);
    }
    
    public function first()
    {
        $this->limit(1);
        $results = $this->get();
        
        return $results[0] ?? null;
    }
    
    public function count(): int
    {
        $sql = $this->buildSelect(true);
        
        $db = Database::getInstance();
        $result = $db->selectOne($sql, $this->params);
        
        return (int) ($result->count ?? 0);
    }
    
    protected function buildSelect(bool $count = false): string
    {
        if ($count) {
            $sql = "SELECT COUNT(*) as count FROM {$this->table}";
        } else {
            $sql = "SELECT * FROM {$this->table}";
        }
        
        if (!empty($this->wheres)) {
            $sql .= " WHERE ";
            
            $conditions = [];
            foreach ($this->wheres as $index => $where) {
                $prefix = $index > 0 ? strtoupper($where['type']) . ' ' : '';
                $conditions[] = $prefix . "{$where['column']} {$where['operator']} ?";
            }
            
            $sql .= implode(' ', $conditions);
        }
        
        if (!$count) {
            if (!empty($this->orders)) {
                $sql .= " ORDER BY " . implode(', ', $this->orders);
            }
            
            if ($this->limit !== null) {
                $sql .= " LIMIT {$this->limit}";
            }
            
            if ($this->offset !== null) {
                $sql .= " OFFSET {$this->offset}";
            }
        }
        
        return $sql;
    }
    
    public function delete(): int
    {
        $sql = "DELETE FROM {$this->table}";
        
        if (!empty($this->wheres)) {
            $sql .= " WHERE ";
            
            $conditions = [];
            foreach ($this->wheres as $index => $where) {
                $prefix = $index > 0 ? strtoupper($where['type']) . ' ' : '';
                $conditions[] = $prefix . "{$where['column']} {$where['operator']} ?";
            }
            
            $sql .= implode(' ', $conditions);
        }
        
        $db = Database::getInstance();
        $stmt = $db->query($sql, $this->params);
        
        return $stmt->rowCount();
    }
    
    public function update(array $data): int
    {
        $set = [];
        $params = [];
        
        foreach ($data as $column => $value) {
            $set[] = "$column = ?";
            $params[] = $value;
        }
        
        $set = implode(', ', $set);
        
        $sql = "UPDATE {$this->table} SET $set";
        
        if (!empty($this->wheres)) {
            $sql .= " WHERE ";
            
            $conditions = [];
            foreach ($this->wheres as $index => $where) {
                $prefix = $index > 0 ? strtoupper($where['type']) . ' ' : '';
                $conditions[] = $prefix . "{$where['column']} {$where['operator']} ?";
                $params[] = $where['value'];
            }
            
            $sql .= implode(' ', $conditions);
        }
        
        $db = Database::getInstance();
        $stmt = $db->query($sql, $params);
        
        return $stmt->rowCount();
    }
}