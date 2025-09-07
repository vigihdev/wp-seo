<?php

declare(strict_types=1);

namespace WpSeo;

use vigihdev\WpSchemaOrgModel\{BreadcrumbList, Carousel, ListinganKendaraanSchema, LocalBusiness, NewsArticle, Organization, RentalAkomodasiSchema, VacationRental, WebSite};


final class SchemaMarkup extends BaseWpSeo
{


    /**
     *
     * @return string|null
     */
    public static function render(): ?string
    {
        return (new self())->run();
    }

    /**
     *
     * @return string|null
     */
    protected function run(): ?string
    {

        $schemaList = array_filter([
            (new Organization())->render(),
            (new LocalBusiness())->render(),
            (new NewsArticle())->render(),
            (new WebSite())->render(),
            (new BreadcrumbList())->render(),

            // (new Carousel())->render(),
            // (new RentalAkomodasiSchema())->render(),
            // (new ListinganKendaraanSchema())->render(),
        ], function ($schema) {
            return !is_null($schema);
        });

        return implode(PHP_EOL, $schemaList);
    }
}
