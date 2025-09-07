<?php

declare(strict_types=1);

namespace WpSeo;

use Yiisoft\Html\Tag\{Html, Meta};

final class MetaTag extends AbstractWpSeo
{


    public function render(): string
    {
        return implode(PHP_EOL, [
            // MetaTag
            Meta::tag()->name('title')->content($this->metaTitle())->render(),
            Meta::tag()->name('description')->content($this->metaDescription())->render(),
            Meta::tag()->name('keywords')->content($this->metaKeywords())->render(),

            // Site verification
            Meta::tag()->name('google-site-verification')->content('wANIFY7u5b5u0CTWr8tGSWIG4KMytYgOZS2mkAVSMSc')->render(),
            Meta::tag()->name('msvalidate.01')->content('157FF5395DA0247121C6D143E028ECA2')->render(),
            Meta::tag()->name('yandex-verification')->content('d9d90efd7492a230')->render(),
            Meta::tag()->name('facebook-domain-verification')->content('cyhv9askq1vkpnd1krz9qo015yzccl')->render(),
            Meta::tag()->name('p:domain_verify')->content('a15185b812a90cb0a2b98c0e8300386f')->render(),
            // Meta::tag()->name('assets-version')->content((string)ASSETS_VERSION)->render(),

            Meta::tag()->name('robots')->content('index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1')->render(),
            Meta::tag()->name('google')->content('notranslate')->render(),
            Meta::tag()->name('googlebot')->content('notranslate')->render(),

            // Pwa
            Meta::tag()->name('theme-color')->content('#CC0000')->render(),
            Meta::tag()->name('viewport')->content('width=device-width')->render(),
            Meta::tag()->name('viewport')->content('width=device-width, initial-scale=1, user-scalable=1, minimum-scale=1, maximum-scale=5')->render(),
        ]);
    }

    protected function metaTitle(): string
    {
        global $page, $paged;

        $title = '';

        // Get wp_title
        $title .= wp_get_document_title();

        // Add the site name
        $title .= ' | ' . get_bloginfo('name');

        // Add the site description for the home/front page
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page())) {
            $title .= " | $site_description";
        }

        // Add a page number if necessary
        if (($paged >= 2 || $page >= 2) && !is_404()) {
            $title .= ' | ' . sprintf(__('Page %s', 'textdomain'), max($paged, $page));
        }

        return esc_html($title);
    }

    protected function metaKeywords(): string
    {
        global $post;

        $keywords = [];

        if (is_single() || is_page()) {
            // Get tags as keywords
            $tags = get_the_tags($post->ID);
            if ($tags) {
                foreach ($tags as $tag) {
                    $keywords[] = $tag->name;
                }
            }

            // Get categories as keywords
            $categories = get_the_category($post->ID);
            if ($categories) {
                foreach ($categories as $category) {
                    $keywords[] = $category->name;
                }
            }
        } elseif (is_category()) {
            $keywords[] = single_cat_title('', false);
        } elseif (is_tag()) {
            $keywords[] = single_tag_title('', false);
        }

        // Add site name as keyword
        $keywords[] = get_bloginfo('name');

        return esc_attr(implode(', ', array_unique($keywords)));
    }

    protected function metaDescription(): string
    {
        global $post;

        $description = '';

        if (is_single() || is_page()) {
            // Use excerpt if available
            if (has_excerpt($post->ID)) {
                $description = get_the_excerpt($post->ID);
            } else {
                // Generate from content
                $content = strip_tags(get_the_content());
                $description = wp_trim_words($content, 25, '...');
            }
        } elseif (is_category()) {
            $description = category_description();
            if (empty($description)) {
                $description = 'Posts in ' . single_cat_title('', false) . ' category';
            }
        } elseif (is_tag()) {
            $description = tag_description();
            if (empty($description)) {
                $description = 'Posts tagged with ' . single_tag_title('', false);
            }
        } elseif (is_home() || is_front_page()) {
            $description = get_bloginfo('description');
        }

        return esc_attr(trim(strip_tags($description)));
    }
}
