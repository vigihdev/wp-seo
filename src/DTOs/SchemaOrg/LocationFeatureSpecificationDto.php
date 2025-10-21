<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg;

use WpSeo\Contracts\SchemaOrg\LocationFeatureSpecificationContract;
use WpSeo\DTOs\BaseDto;

final class LocationFeatureSpecificationDto extends BaseDto implements LocationFeatureSpecificationContract
{
    public function __construct(
        private readonly string $name,
        private readonly bool $value,
        private readonly string $type = 'LocationFeatureSpecification'
    ) {}

    public function getType(): string
    {
        return $this->type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): bool
    {
        return $this->value;
    }
}
