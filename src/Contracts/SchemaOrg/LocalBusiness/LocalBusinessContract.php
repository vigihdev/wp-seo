<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg\LocalBusiness;

interface LocalBusinessContract
{
    public function getName(): string;
    public function getDescription(): string;
    public function getUrl(): string;
    public function getTelephone(): string;
    public function getEmail(): string;
    public function getAddress(): PostalAddressContract;
    public function getGeo(): GeoCoordinatesContract;
    public function getOpeningHours(): array;
    public function getPriceRange(): string;
}
