<?php

declare(strict_types=1);

namespace WpSeo\OpenGraph;


final class OpenGraphDispatcher
{

    public static function dispatch(): string
    {

        // TwitterOpenGraph
        $content = implode(PHP_EOL, [
            (new FacebookOpenGraph())->render(),
            (new TwitterOpenGraph())->render()
        ]);
        return $content;
    }
}
