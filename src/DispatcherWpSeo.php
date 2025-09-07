<?php

declare(strict_types=1);

namespace WpSeo;

final class DispatcherWpSeo
{

    public static function dispatch(): string
    {

        $content = implode(PHP_EOL, [
            (new MetaTag())->render()
        ]);

        return $content;
    }
}
