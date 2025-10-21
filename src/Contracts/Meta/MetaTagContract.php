<?php

declare(strict_types=1);

namespace WpSeo\Contracts\Meta;

interface MetaTagContract
{
    public function getName(): string;
    public function getContent(): string;
}
