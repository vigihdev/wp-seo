<?php

declare(strict_types=1);

namespace WpSeo\DTOs;

use ReflectionClass;
use ReflectionProperty;

abstract class BaseDto
{
    public function toArray(): array
    {
        $reflection = new ReflectionClass($this);
        $properties = $reflection->getProperties();

        $result = [];
        foreach ($properties as $property) {
            $property->setAccessible(true);
            $value = $property->getValue($this);

            $result[$property->getName()] = $this->convertValue($value);
        }

        return $result;
    }

    private function convertValue(mixed $value): mixed
    {
        // Handle nested DTOs
        if ($value instanceof self) {
            return $value->toArray();
        }

        // Handle arrays (including arrays of DTOs)
        if (is_array($value)) {
            return array_map(fn($item) => $this->convertValue($item), $value);
        }

        return $value;
    }

    public function toJson(int $flags = JSON_THROW_ON_ERROR): string
    {
        return json_encode($this->toArray(), $flags);
    }
}
