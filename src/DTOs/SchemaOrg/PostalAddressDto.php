<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg;

use WpSeo\Contracts\SchemaOrg\PostalAddressContract;
use WpSeo\DTOs\BaseDto;

final class PostalAddressDto extends BaseDto implements PostalAddressContract
{
    public function __construct(
        private readonly string $streetAddress,
        private readonly string $addressLocality,
        private readonly string $addressCountry,
        private readonly string $addressRegion,
        private readonly string $postalCode,
        private readonly string $type = 'PostalAddress'
    ) {}

    public function getType(): string
    {
        return $this->type;
    }

    public function getStreetAddress(): string
    {
        return $this->streetAddress;
    }

    public function getAddressLocality(): string
    {
        return $this->addressLocality;
    }

    public function getAddressCountry(): string
    {
        return $this->addressCountry;
    }

    public function getAddressRegion(): string
    {
        return $this->addressRegion;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }
}
