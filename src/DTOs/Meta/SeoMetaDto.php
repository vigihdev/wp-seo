<?php

declare(strict_types=1);

namespace WpSeo\DTOs\Meta;

use WpSeo\Contracts\Meta\SeoMetaContract;
use WpSeo\DTOs\BaseDto;

final class SeoMetaDto extends BaseDto implements SeoMetaContract
{
    public function __construct(
        private readonly string $title,
        private readonly string $description,
        private readonly string $keyword,
        private readonly string $author,
    ) {}

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getKeyword(): string
    {
        return $this->keyword;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }
}
