<?php

declare(strict_types=1);

namespace WpSeo\Renderers\Meta;

use WpSeo\Contracts\RendererContract;
use WpSeo\DTOs\Meta\SeoMetaDto;
use Yiisoft\Html\Tag\Meta;
use Yiisoft\Html\Tag\Title;

final class SeoMetaRenderer implements RendererContract
{

    public function __construct(
        private readonly SeoMetaDto $seoMeta
    ) {}

    public function render(): string
    {

        return implode(PHP_EOL, [
            Title::tag()->content($this->seoMeta->getTitle())->render(),
            Meta::tag()->name('description')->content($this->seoMeta->getDescription())->render(),
            Meta::tag()->name('keyword')->content($this->seoMeta->getKeyword())->render(),
            Meta::tag()->name('author')->content($this->seoMeta->getAuthor())->render(),
        ]);
    }
}
