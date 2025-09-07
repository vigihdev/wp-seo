<?php

declare(strict_types=1);

namespace WpSeo\SchemaOrg;

use Spatie\SchemaOrg\Schema;
use WpSeo\AbstractWpSeo;


final class NewsArticle extends AbstractWpSeo
{


    public function render(): string
    {
        return '';
    }

    public static function generate(): array
    {
        global $post;

        if (!is_single()) {
            return [];
        }

        $author = get_the_author_meta('display_name', $post->post_author);
        $thumbnail = get_the_post_thumbnail_url($post->ID, 'full');

        return Schema::newsArticle()
            ->headline(get_the_title($post->ID))
            ->description(get_the_excerpt($post->ID))
            ->author(
                Schema::person()->name($author)
            )
            ->publisher(
                Schema::organization()
                    ->name(get_bloginfo('name'))
                    ->url(home_url())
            )
            ->datePublished(get_the_date('c', $post->ID))
            ->dateModified(get_the_modified_date('c', $post->ID))
            ->url(get_permalink($post->ID))
            ->image($thumbnail ?: '')
            ->mainEntityOfPage(get_permalink($post->ID))
            ->toArray();
    }
}
