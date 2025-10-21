<?php

declare(strict_types=1);

namespace WpSeo\Renderers;

use WpSeo\Contracts\RendererContract;

abstract class BaseRenderer implements RendererContract
{

    abstract public function render(): string;

    abstract public function addItem(mixed $item): self;

    /**
     * Escape HTML content
     */
    protected function escape(string $value): string
    {
        return esc_html($value);
    }

    /**
     * Escape URL
     */
    protected function escapeUrl(string $url): string
    {
        return esc_url($url);
    }

    /**
     * Escape attribute value
     */
    protected function escapeAttr(string $value): string
    {
        return esc_attr($value);
    }

    /**
     * Render multiple items
     */
    protected function renderMultiple(array $items, string $separator = PHP_EOL): string
    {
        return implode($separator, array_filter($items));
    }
}
