<?php

declare(strict_types=1);

namespace WpSeo\Entity;

use WpSeo\Contracts\Wp\WpAuthorContract;

final class WpAuthorInfo implements WpAuthorContract
{

    public function __construct(
        private readonly int $authorId
    ) {}

    public function getNicename(): string
    {
        return get_the_author_meta('nicename', $this->authorId) ?: '';
    }

    public function getEmail(): string
    {
        return get_the_author_meta('email', $this->authorId) ?: '';
    }

    public function getUrl(): string
    {
        return get_the_author_meta('url', $this->authorId) ?: '';
    }

    public function getStatus(): string
    {
        return get_the_author_meta('status', $this->authorId) ?: '';
    }
}
