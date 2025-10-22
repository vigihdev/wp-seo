<?php

declare(strict_types=1);

namespace WpSeo\Entity;

use WP_Post;
use WpSeo\Contracts\Wp\WpPostInfoContract;

final class WpPostInfo implements WpPostInfoContract
{

    public function __construct(
        private readonly ?WP_Post $post = null
    ) {}

    public function getTitle(): string
    {
        return $this->post?->post_title ?? '';
    }

    public function getKeyword(): string
    {
        $keyword = preg_replace('/[^a-zA-Z-0-9\s]+/', '', $this->getTitle());
        $keyword = preg_replace('/\s+/m', ',', $keyword);
        $keyword = strtolower($keyword);
        return $keyword;
    }

    public function getAuthor(): string
    {
        return $this->getAuthorInfo()?->getNicename() ?? '';
    }

    public function getAuthorInfo(): ?WpAuthorInfo
    {
        $authorId = $this->post?->post_author;
        return $authorId ? new WpAuthorInfo(authorId: (int) $authorId) : null;
    }

    public function getKategori(): ?WpKategoriInfo
    {
        $ID = $this->post?->ID ?? 0;
        $categories = wp_get_post_categories((int) $ID, array('fields' => 'all'));
        $categorie = current($categories) ?? null;
        return $categorie ? new WpKategoriInfo(wpTerm: $categorie) : null;
    }

    public function getSiteInfo(): WpSiteInfo
    {
        return new WpSiteInfo();
    }

    public function getDescription(): string
    {
        return substr($this->getContentWord(), 0, 200);
    }

    public function getUrl(): string
    {
        return $this->post ? get_permalink($this->post) : '';
    }

    private function getContentWord(): string
    {
        if (!$this->post) {
            return '';
        }

        $content = $this->post->post_content;

        // Remove HTML comments (termasuk WP comments)
        $content = preg_replace('/<!--(.|\s)*?-->/', '', $content);

        // Remove shortcodes
        $content = strip_shortcodes($content);

        // Remove HTML tags
        $content = strip_tags($content);

        // Normalize whitespace
        $content = preg_replace('/\s+/', ' ', $content);

        return trim($content);
    }

    public function getFeaturedImage(): ?string
    {
        if (!$this->post) {
            return null;
        }

        // Cek featured image dulu
        if (has_post_thumbnail($this->post->ID)) {
            return get_the_post_thumbnail_url($this->post->ID, 'full');
        }

        // Kalau ga ada, cari gambar pertama di content
        $content = $this->post->post_content;
        preg_match('/<img.+?src=["\']([^"\']+)["\'].*?>/i', $content, $matches);

        return $matches[1] ?? null;
    }
}
