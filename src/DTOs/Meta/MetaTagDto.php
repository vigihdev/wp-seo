<?php

declare(strict_types=1);

namespace WpSeo\DTOs\Meta;

use WpSeo\DTOs\BaseDto;
use WpSeo\Contracts\Meta\MetaTagContract;

final class MetaTagDto extends BaseDto implements MetaTagContract
{
    public function __construct(
        private readonly string $name,
        private readonly string $content,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
