<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg\LocalBusiness;

use WpSeo\Contracts\SchemaOrg\LocalBusiness\{GeoCoordinatesContract, LocalBusinessContract, PostalAddressContract};
use WpSeo\DTOs\BaseDto;

final class LocalBusinessDto extends BaseDto implements LocalBusinessContract
{

    public function __construct(
        private readonly string $name,
        private readonly string $description,
        private readonly string $url,
        private readonly string $telephone,
        private readonly string $email,
        private readonly PostalAddressContract $address,
        private readonly GeoCoordinatesContract $geo,
        private readonly array $openingHours,
        private readonly string $priceRange,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getAddress(): PostalAddressContract
    {
        return $this->address;
    }

    public function getGeo(): GeoCoordinatesContract
    {
        return $this->geo;
    }

    public function getOpeningHours(): array
    {
        return $this->openingHours;
    }

    public function getPriceRange(): string
    {
        return $this->priceRange;
    }
}
