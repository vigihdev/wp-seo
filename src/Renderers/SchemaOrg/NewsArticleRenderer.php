<?php

declare(strict_types=1);

namespace WpSeo\Renderers\SchemaOrg;

use Spatie\SchemaOrg\Schema;
use WpSeo\DTOs\SchemaOrg\NewsArticleDto;

final class NewsArticleRenderer extends BaseSchemaOrgRenderer
{

    public function __construct(
        private readonly NewsArticleDto $newsArticle
    ) {}


    public function render(): string
    {

        $news = $this->newsArticle;
        return Schema::newsArticle()
            ->setProperty('@id', $this->schemaIdGenerator('newsArticle'))
            ->headline($news->getHeadline())
            ->datePublished($news->getDatePublished())
            ->dateModified($news->getDateModified())
            ->author($news->getAuthor())
            ->image($news->getImage())
            ->toScript();
    }
}
