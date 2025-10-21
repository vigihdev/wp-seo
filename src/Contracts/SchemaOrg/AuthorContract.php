<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg;

interface AuthorContract
{
    public function getType(): string; // "Person" or "Organization"
    public function getName(): string;
    public function getUrl(): string;
}
