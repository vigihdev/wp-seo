<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg;

interface RatingContract
{
    public function getType(): string;
    public function getRatingValue(): int|float;
    public function getBestRating(): int;
}
