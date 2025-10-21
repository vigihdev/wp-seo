<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg;

interface AggregateRatingContract
{
    public function getRatingValue(): float;
    public function getRatingCount(): int;
    public function getReviewCount(): int;
    public function getWorstRating(): int;
    public function getBestRating(): int;
}
