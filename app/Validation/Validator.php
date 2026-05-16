<?php

declare(strict_types=1);

namespace App\Validation;

/**
 * Simple validation helper for forms.
 */
final class Validator
{
    private array $errors = [];

    public function validate(array $data, array $rules): bool
    {
        $this->errors = [];

        foreach ($rules as $field => $ruleString) {
            $rulesList = explode('|', $ruleString);
            $value = trim((string) ($data[$field] ?? ''));

            foreach ($rulesList as $rule) {
                match ($rule) {
                    'required' => $this->checkRequired($field, $value),
                    'min:3' => $this->checkMin($field, $value, 3),
                    'max:255' => $this->checkMax($field, $value, 255),
                    default => null,
                };
            }
        }

        return $this->errors === [];
    }

    private function checkRequired(string $field, string $value): void
    {
        if ($value === '') {
            $this->errors[$field][] = ucfirst($field) . ' is required.';
        }
    }

    private function checkMin(string $field, string $value, int $min): void
    {
        if ($value !== '' && strlen($value) < $min) {
            $this->errors[$field][] = ucfirst($field) . " must be at least {$min} characters.";
        }
    }

    private function checkMax(string $field, string $value, int $max): void
    {
        if (strlen($value) > $max) {
            $this->errors[$field][] = ucfirst($field) . " must not exceed {$max} characters.";
        }
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function firstError(string $field): ?string
    {
        return $this->errors[$field][0] ?? null;
    }
}

