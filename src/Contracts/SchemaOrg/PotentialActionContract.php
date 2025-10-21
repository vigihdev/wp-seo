<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg;

interface PotentialActionContract
{
    public function getTarget(): string;
    public function getQueryInput(): string;
}
