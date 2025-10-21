<?php

declare(strict_types=1);

namespace WpSeo\DTOs\Meta;

use WpSeo\DTOs\BaseDto;
use WpSeo\Contracts\Meta\MetaLinkContract;

final class MetaLinkDto extends BaseDto implements MetaLinkContract
{
    public function __construct(
        private readonly string $rel,
        private readonly string $href,
        private readonly string $type = ''
    ) {}

    public function getRel(): string
    {
        return $this->rel;
    }

    public function getHref(): string
    {
        return $this->href;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
