<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg\LocalBusiness;

interface GeoCoordinatesContract
{
    public function getLatitude(): float;
    public function getLongitude(): float;
}
