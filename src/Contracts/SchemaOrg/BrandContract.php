<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg;

interface BrandContract
{
    public function getType(): string;
    public function getName(): string;
}
