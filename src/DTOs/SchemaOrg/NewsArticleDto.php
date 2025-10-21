<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg;

use WpSeo\Contracts\SchemaOrg\NewsArticleContract;
use WpSeo\DTOs\BaseDto;

final class NewsArticleDto extends BaseDto implements NewsArticleContract
{
    /**
     * @param string[] $image
     * @param AuthorDto[] $author
     */
    public function __construct(
        private readonly string $headline,
        private readonly array $image,
        private readonly string $datePublished,
        private readonly string $dateModified,
        private readonly array $author
    ) {}

    public function getHeadline(): string
    {
        return $this->headline;
    }

    public function getImage(): array
    {
        return $this->image;
    }

    public function getDatePublished(): string
    {
        return $this->datePublished;
    }

    public function getDateModified(): string
    {
        return $this->dateModified;
    }

    public function getAuthor(): array
    {
        return $this->author;
    }
}
