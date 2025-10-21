<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg;

interface QuantitativeValueContract
{
    public function getType(): string;
    public function getValue(): int|float;
    public function getUnitCode(): ?string;
}
