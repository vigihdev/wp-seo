<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg\LocalBusiness;

interface PostalAddressContract
{
    public function getStreetAddress(): string;
    public function getAddressLocality(): string;
    public function getAddressRegion(): ?string;
    public function getPostalCode(): string;
    public function getAddressCountry(): string;
}
