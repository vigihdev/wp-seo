<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg;

interface BreadcrumbListContract
{

    public function getPosition(): int;
    public function getName(): string;
    public function getItem(): string;
}
