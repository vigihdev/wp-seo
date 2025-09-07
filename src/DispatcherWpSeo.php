<?php

declare(strict_types=1);

namespace WpSeo;

use WpSeo\OpenGraph\OpenGraphDispatcher;
use WpSeo\SchemaOrg\SchemaOrgDispatcher;


final class DispatcherWpSeo
{

    public static function dispatch(): string
    {

        $content = implode(PHP_EOL, [
            (new MetaTag())->render(),
            (new MetaLink())->render(),
            OpenGraphDispatcher::dispatch(),
            SchemaOrgDispatcher::dispatch(),
        ]);

        return $content;
    }
}
