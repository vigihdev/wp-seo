<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg;

interface LocationFeatureSpecificationContract
{
    public function getType(): string;
    public function getName(): string;
    public function getValue(): bool;
}
