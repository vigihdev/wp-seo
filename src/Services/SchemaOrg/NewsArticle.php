<?php

declare(strict_types=1);

namespace WpSeo\Services\SchemaOrg;

use WpSeo\Contracts\Wp\WpPostInfoContract;
use WpSeo\Services\BaseService;
use WpSeo\DTOs\SchemaOrg\{NewsArticleDto, AuthorDto};
use WpSeo\Renderers\SchemaOrg\NewsArticleRenderer;

final class NewsArticle extends BaseService
{

    public function __construct(
        private readonly WpPostInfoContract $post
    ) {}

    public function render(): string
    {

        $newsArticle = new NewsArticleRenderer(
            newsArticle: new NewsArticleDto(
                headline: $this->post->getTitle(),
                image: [
                    $this->post->getFeaturedImage() ?? ''
                ],
                datePublished: $this->post->getDatePublished(),
                dateModified: $this->post->getDateModified(),
                author: [
                    new AuthorDto(
                        name: $this->post->getAuthor(),
                        url: $this->post->getAuthorPostsUrl()
                    )
                ]
            )
        );

        return $newsArticle->render();
    }
}
