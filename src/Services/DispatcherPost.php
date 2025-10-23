<?php

declare(strict_types=1);

namespace WpSeo\Services;

use WP_Post;
use WpSeo\Contracts\Services\DispatcherPostContract;
use WpSeo\Entity\{WpPostInfo};
use WpSeo\DTOs\Meta\{SeoMetaDto};
use WpSeo\Renderers\Meta\{SeoMetaRenderer};
use WpSeo\Services\SchemaOrg\{Organization, BreadcrumbList, NewsArticle, WebSite, LocalBusiness};

final class DispatcherPost implements DispatcherPostContract
{

    private ?WpPostInfo $post = null;

    public function buildForPost(int $postId): string
    {

        $postData = WP_Post::get_instance($postId);
        if (!$postData) {
            return '';
        }

        $this->post = new WpPostInfo(post: $postData);

        return implode(PHP_EOL, [
            $this->seoMeta()->render(),
            (new MetaLink())->render(),
            (new MetaTag())->render(),
            (new FacebookOpenGraph(post: $this->post))->render(),
            (new TwitterOpenGraph(post: $this->post))->render(),
            (new LocalBusiness())->render(),
            (new Organization())->render(),
            (new BreadcrumbList(post: $this->post))->render(),
            (new NewsArticle(post: $this->post))->render(),
            (new WebSite())->render(),
        ]);
    }

    private function seoMeta(): SeoMetaRenderer
    {
        $post = $this->post;
        return new SeoMetaRenderer(
            seoMeta: new SeoMetaDto(
                title: $post->getTitle(),
                description: $post->getDescription(),
                keyword: $post->getKeyword(),
                author: $post->getAuthor()
            )
        );
    }
}
