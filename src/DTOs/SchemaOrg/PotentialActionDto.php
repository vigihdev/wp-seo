<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg;

use WpSeo\Contracts\SchemaOrg\PotentialActionContract;
use WpSeo\DTOs\BaseDto;

final class PotentialActionDto extends BaseDto implements PotentialActionContract
{
    public function __construct(
        private readonly string $target,
        private readonly string $queryInput
    ) {}

    public function getTarget(): string
    {
        return $this->target;
    }

    public function getQueryInput(): string
    {
        return $this->queryInput;
    }
}
