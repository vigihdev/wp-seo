<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg;

use WpSeo\Contracts\SchemaOrg\RatingContract;
use WpSeo\DTOs\BaseDto;

final class RatingDto extends BaseDto implements RatingContract
{
    public function __construct(
        private readonly int|float $ratingValue,
        private readonly int $bestRating,
        private readonly string $type = 'Rating'
    ) {}

    public function getType(): string
    {
        return $this->type;
    }

    public function getRatingValue(): int|float
    {
        return $this->ratingValue;
    }

    public function getBestRating(): int
    {
        return $this->bestRating;
    }
}
