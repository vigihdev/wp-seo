<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg\LocalBusiness;

use WpSeo\Contracts\SchemaOrg\LocalBusiness\GeoCoordinatesContract;
use WpSeo\DTOs\BaseDto;

final class GeoCoordinatesDto extends BaseDto implements GeoCoordinatesContract
{

    public function __construct(
        private readonly float $latitude,
        private readonly float $longitude
    ) {}

    public function getLatitude(): float
    {
        return $this->latitude;
    }
    public function getLongitude(): float
    {
        return $this->longitude;
    }
}
