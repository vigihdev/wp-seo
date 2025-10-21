<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg;

use WpSeo\Contracts\SchemaOrg\BedDetailsContract;
use WpSeo\DTOs\BaseDto;

final class BedDetailsDto extends BaseDto implements BedDetailsContract
{
    public function __construct(
        private readonly int $numberOfBeds,
        private readonly string $typeOfBed,
        private readonly string $type = 'BedDetails'
    ) {}

    public function getType(): string
    {
        return $this->type;
    }

    public function getNumberOfBeds(): int
    {
        return $this->numberOfBeds;
    }

    public function getTypeOfBed(): string
    {
        return $this->typeOfBed;
    }
}
