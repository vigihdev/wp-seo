<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg;

use WpSeo\Contracts\SchemaOrg\AuthorContract;
use WpSeo\DTOs\BaseDto;

final class AuthorDto extends BaseDto implements AuthorContract
{
    public function __construct(
        private readonly string $name,
        private readonly string $url,
        private readonly string $type = 'Person'
    ) {}

    public function getType(): string
    {
        return $this->type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}
