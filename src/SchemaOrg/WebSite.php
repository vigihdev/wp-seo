<?php

declare(strict_types=1);

namespace WpSeo\SchemaOrg;

use Spatie\SchemaOrg\Schema;
use WpSeo\AbstractWpSeo;

final class WebSite extends AbstractWpSeo
{


    public function render(): string
    {
        return $this->generate();
    }

    private function generate(): string
    {
        return Schema::webSite()
            ->name(get_bloginfo('name'))
            ->url(home_url())
            ->description(get_bloginfo('description'))
            ->potentialAction(
                Schema::searchAction()
                    ->target(home_url('/?s={search_term_string}'))
                    ->setProperty('query-input', 'required name=search_term_string')
            )
            ->toScript();
    }
}
