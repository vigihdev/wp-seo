<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg;

use WpSeo\Contracts\SchemaOrg\BreadcrumbListContract;
use WpSeo\DTOs\BaseDto;

final class BreadcrumbListDto extends BaseDto implements BreadcrumbListContract
{
    public function __construct(
        private readonly int $position,
        private readonly string $name,
        private readonly string $item
    ) {}

    public function getPosition(): int
    {
        return $this->position;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getItem(): string
    {
        return $this->item;
    }
}
