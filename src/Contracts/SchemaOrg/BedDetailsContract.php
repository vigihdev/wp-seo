<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg;

interface BedDetailsContract
{
    public function getType(): string;
    public function getNumberOfBeds(): int;
    public function getTypeOfBed(): string;
}
