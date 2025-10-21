<?php

declare(strict_types=1);

namespace WpSeo\Contracts\Meta;

interface MetaLinkContract
{

    public function getRel(): string;
    public function getHref(): string;
    public function getType(): string;
}
