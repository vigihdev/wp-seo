<?php

declare(strict_types=1);

namespace WpSeo\Services\SchemaOrg;

use WpSeo\Contracts\Wp\WpPostInfoContract;
use WpSeo\Services\BaseService;
use WpSeo\DTOs\SchemaOrg\{NewsArticleDto, AuthorDto, ImageSimpleDto};
use WpSeo\Renderers\SchemaOrg\NewsArticleRenderer;

final class NewsArticle extends BaseService
{

    public function __construct(
        private readonly WpPostInfoContract $post
    ) {}

    public function render(): string
    {

        /** @var ImageSimpleDto[] $defaultImages  */
        $defaultImages = $this->dtoTransformer(ImageSimpleDto::class, 'default/post-images.json');
        $imageDatas = $this->post->getFeaturedImage() ?
            [$this->post->getFeaturedImage()] : array_map(fn($image) => $image->getImageUrl(), $defaultImages);

        $newsArticle = new NewsArticleRenderer(
            newsArticle: new NewsArticleDto(
                headline: $this->post->getTitle(),
                image: $imageDatas,
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
