<?php

declare(strict_types=1);

namespace WpSeo;


final class WpHead
{

    /**
     *
     * @return string
     */
    public static function registerAll(): string
    {
        RemoveFeed::render();
        return implode(PHP_EOL, [
            MetaTag::render(),
            OpenGraph::render(),
            MetaLink::render(),
            SchemaMarkup::render(),
        ]) . PHP_EOL;
    }

    public function __construct() {}
}
