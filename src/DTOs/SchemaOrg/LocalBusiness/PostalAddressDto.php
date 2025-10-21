<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg\LocalBusiness;

use WpSeo\Contracts\SchemaOrg\LocalBusiness\PostalAddressContract;
use WpSeo\DTOs\BaseDto;

final class PostalAddressDto extends BaseDto implements PostalAddressContract
{

    public function __construct(
        private readonly string $streetAddress,
        private readonly string $addressLocality,
        private readonly string $postalCode,
        private readonly string $addressCountry,
        private readonly ?string $addressRegion = null
    ) {}

    public function getStreetAddress(): string
    {
        return $this->streetAddress;
    }

    public function getAddressLocality(): string
    {
        return $this->addressLocality;
    }

    public function getAddressRegion(): ?string
    {
        return $this->addressRegion;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function getAddressCountry(): string
    {
        return $this->addressCountry;
    }
}
