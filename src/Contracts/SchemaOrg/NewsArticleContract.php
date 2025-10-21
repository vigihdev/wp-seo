<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg;

interface NewsArticleContract
{
    public function getHeadline(): string;

    /**
     * @return string[]
     */
    public function getImage(): array;

    public function getDatePublished(): string;

    public function getDateModified(): string;

    /**
     * @return AuthorContract[]
     */
    public function getAuthor(): array;
}
