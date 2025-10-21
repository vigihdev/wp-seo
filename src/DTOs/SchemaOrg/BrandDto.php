<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg;

use WpSeo\Contracts\SchemaOrg\BrandContract;
use WpSeo\DTOs\BaseDto;

final class BrandDto extends BaseDto implements BrandContract
{
    public function __construct(
        private readonly string $name,
        private readonly string $type = 'Brand'
    ) {}

    public function getType(): string
    {
        return $this->type;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
