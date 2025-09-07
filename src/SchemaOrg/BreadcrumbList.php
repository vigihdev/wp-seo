<?php

declare(strict_types=1);

namespace WpSeo\SchemaOrg;

use Spatie\SchemaOrg\Schema;
use WpSeo\AbstractWpSeo;


final class BreadcrumbList extends AbstractWpSeo
{


    public function render(): string
    {
        return $this->generate();
    }

    private function generate(): string
    {

        if (is_home() || is_front_page()) {
            return '';
        }

        $breadcrumbs = [
            Schema::listItem()
                ->position(1)
                ->name('Home')
                ->item(home_url()),
        ];

        return Schema::breadcrumbList()
            ->itemListElement($breadcrumbs)
            ->toScript();
    }
}
