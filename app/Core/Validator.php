<?php

namespace App\Core;

class Validator
{
    protected array $data;
    protected array $rules;
    protected array $errors = [];
    protected array $validated = [];
    
    public function __construct(array $data, array $rules)
    {
        $this->data = $data;
        $this->rules = $rules;
        $this->validate();
    }
    
    protected function validate(): void
    {
        foreach ($this->rules as $field => $rules) {
            $rules = is_string($rules) ? explode('|', $rules) : $rules;
            
            $value = $this->data[$field] ?? null;
            
            foreach ($rules as $rule) {
                $this->validateRule($field, $value, $rule);
            }
            
            if (!isset($this->errors[$field])) {
                $this->validated[$field] = $value;
            }
        }
    }
    
    protected function validateRule(string $field, $value, string $rule): void
    {
        $params = [];
        
        if (strpos($rule, ':') !== false) {
            [$rule, $paramString] = explode(':', $rule, 2);
            $params = explode(',', $paramString);
        }
        
        $method = 'validate' . str_replace(' ', '', ucwords(str_replace('_', ' ', $rule)));
        
        if (method_exists($this, $method)) {
            if (!$this->$method($field, $value, $params)) {
                $this->addError($field, $rule, $params);
            }
        }
    }
    
    protected function validateRequired(string $field, $value, array $params): bool
    {
        return !empty($value) || $value === '0' || $value === 0;
    }
    
    protected function validateEmail(string $field, $value, array $params): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    protected function validateMin(string $field, $value, array $params): bool
    {
        $min = (int) ($params[0] ?? 0);
        
        if (is_numeric($value)) {
            return $value >= $min;
        }
        
        return strlen((string)$value) >= $min;
    }
    
    protected function validateMax(string $field, $value, array $params): bool
    {
        $max = (int) ($params[0] ?? 0);
        
        if (is_numeric($value)) {
            return $value <= $max;
        }
        
        return strlen((string)$value) <= $max;
    }
    
    protected function validateBetween(string $field, $value, array $params): bool
    {
        $min = (int) ($params[0] ?? 0);
        $max = (int) ($params[1] ?? 0);
        
        if (is_numeric($value)) {
            return $value >= $min && $value <= $max;
        }
        
        $length = strlen((string)$value);
        return $length >= $min && $length <= $max;
    }
    
    protected function validateNumeric(string $field, $value, array $params): bool
    {
        return is_numeric($value);
    }
    
    protected function validateInteger(string $field, $value, array $params): bool
    {
        return filter_var($value, FILTER_VALIDATE_INT) !== false;
    }
    
    protected function validateBoolean(string $field, $value, array $params): bool
    {
        return in_array($value, [true, false, 1, 0, '1', '0', 'true', 'false'], true);
    }
    
    protected function validateArray(string $field, $value, array $params): bool
    {
        return is_array($value);
    }
    
    protected function validateUrl(string $field, $value, array $params): bool
    {
        return filter_var($value, FILTER_VALIDATE_URL) !== false;
    }
    
    protected function validateDate(string $field, $value, array $params): bool
    {
        return strtotime($value) !== false;
    }
    
    protected function validateAlpha(string $field, $value, array $params): bool
    {
        return ctype_alpha($value);
    }
    
    protected function validateAlnum(string $field, $value, array $params): bool
    {
        return ctype_alnum($value);
    }
    
    protected function validateRegex(string $field, $value, array $params): bool
    {
        $pattern = $params[0] ?? '';
        return preg_match($pattern, $value) === 1;
    }
    
    protected function validateConfirmed(string $field, $value, array $params): bool
    {
        $confirmationField = $field . '_confirmation';
        return isset($this->data[$confirmationField]) && $this->data[$confirmationField] === $value;
    }
    
    protected function validateUnique(string $field, $value, array $params): bool
    {
        $table = $params[0] ?? '';
        $column = $params[1] ?? $field;
        $except = $params[2] ?? null;
        
        if (empty($table)) {
            return true;
        }
        
        return true;
    }
    
    protected function validateExists(string $field, $value, array $params): bool
    {
        $table = $params[0] ?? '';
        $column = $params[1] ?? $field;
        
        if (empty($table)) {
            return true;
        }
        
        return true;
    }
    
    protected function addError(string $field, string $rule, array $params): void
    {
        $message = $this->getErrorMessage($field, $rule, $params);
        $this->errors[$field][] = $message;
    }
    
    protected function getErrorMessage(string $field, string $rule, array $params): string
    {
        $messages = [
            'required' => 'The :field field is required.',
            'email' => 'The :field must be a valid email address.',
            'min' => 'The :field must be at least :min.',
            'max' => 'The :field may not be greater than :max.',
            'between' => 'The :field must be between :min and :max.',
            'numeric' => 'The :field must be a number.',
            'integer' => 'The :field must be an integer.',
            'boolean' => 'The :field must be true or false.',
            'array' => 'The :field must be an array.',
            'url' => 'The :field must be a valid URL.',
            'date' => 'The :field must be a valid date.',
            'alpha' => 'The :field may only contain letters.',
            'alnum' => 'The :field may only contain letters and numbers.',
            'regex' => 'The :field format is invalid.',
            'confirmed' => 'The :field confirmation does not match.',
            'unique' => 'The :field has already been taken.',
            'exists' => 'The selected :field is invalid.',
        ];
        
        $message = $messages[$rule] ?? "The :field field is invalid.";
        
        $message = str_replace(':field', str_replace('_', ' ', $field), $message);
        
        foreach ($params as $index => $param) {
            $message = str_replace(':' . ($index + 1), $param, $message);
        }
        
        return $message;
    }
    
    public function passes(): bool
    {
        return empty($this->errors);
    }
    
    public function fails(): bool
    {
        return !$this->passes();
    }
    
    public function errors(): array
    {
        return $this->errors;
    }
    
    public function validated(): array
    {
        return $this->validated;
    }
}