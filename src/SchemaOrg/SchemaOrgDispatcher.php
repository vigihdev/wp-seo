<?php

declare(strict_types=1);

namespace WpSeo\SchemaOrg;

final class SchemaOrgDispatcher
{

    public static function dispatch(): string
    {

        $content = implode(PHP_EOL, [
            (new BreadcrumbList())->render(),
            (new WebSite())->render(),
            (new LocalBusiness())->render(),
            (new Organization())->render(),
            (new NewsArticle())->render(),
        ]);

        return $content;
    }
}
