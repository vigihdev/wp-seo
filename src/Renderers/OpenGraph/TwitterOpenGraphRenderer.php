<?php

declare(strict_types=1);

namespace WpSeo\Renderers\OpenGraph;

use WpSeo\Contracts\OpenGraph\OpenGraphContract;
use WpSeo\DTOs\OpenGraph\TwitterCardDto;
use Yiisoft\Html\Tag\Meta;

final class TwitterOpenGraphRenderer extends BaseOpenGraphRenderer
{

    public function __construct(
        private readonly TwitterCardDto $twitterCard,
        private readonly OpenGraphContract $openGraph
    ) {}

    public function render(): string
    {
        return implode(PHP_EOL, [
            Meta::tag()->name('twitter:card')->content($this->twitterCard->getCard())->render(),
            Meta::tag()->name('twitter:site')->content($this->twitterCard->getSite())->render(),
            Meta::tag()->name('twitter:creator')->content($this->twitterCard->getCreator())->render(),
            Meta::tag()->name('twitter:title')->content($this->openGraph->getTitle())->render(),
            Meta::tag()->name('twitter:description')->content($this->openGraph->getDescription())->render(),
            Meta::tag()->name('twitter:image')->content($this->openGraph->getImageUrl())->render(),
        ]);
    }
}
