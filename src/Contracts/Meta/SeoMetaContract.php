<?php

declare(strict_types=1);

namespace WpSeo\Contracts\Meta;

interface SeoMetaContract
{
    public function getTitle(): string;
    public function getDescription(): string;
    public function getKeyword(): string;
    public function getAuthor(): string;
}
