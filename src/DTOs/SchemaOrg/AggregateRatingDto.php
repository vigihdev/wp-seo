<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg;

use WpSeo\Contracts\SchemaOrg\AggregateRatingContract;
use WpSeo\DTOs\BaseDto;

final class AggregateRatingDto extends BaseDto implements AggregateRatingContract
{
    public function __construct(
        private readonly float $ratingValue,
        private readonly int $ratingCount,
        private readonly int $reviewCount,
        private readonly int $worstRating,
        private readonly int $bestRating
    ) {}

    public function getRatingValue(): float
    {
        return $this->ratingValue;
    }

    public function getWorstRating(): int
    {
        return $this->worstRating;
    }

    public function getRatingCount(): int
    {
        return $this->ratingCount;
    }

    public function getReviewCount(): int
    {
        return $this->reviewCount;
    }

    public function getBestRating(): int
    {
        return $this->bestRating;
    }
}
