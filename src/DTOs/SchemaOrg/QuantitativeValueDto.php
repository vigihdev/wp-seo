<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg;

use WpSeo\Contracts\SchemaOrg\QuantitativeValueContract;
use WpSeo\DTOs\BaseDto;

final class QuantitativeValueDto extends BaseDto implements QuantitativeValueContract
{
    public function __construct(
        private readonly int|float $value,
        private readonly ?string $unitCode = null,
        private readonly string $type = 'QuantitativeValue'
    ) {}

    public function getType(): string
    {
        return $this->type;
    }

    public function getValue(): int|float
    {
        return $this->value;
    }

    public function getUnitCode(): ?string
    {
        return $this->unitCode;
    }
}
