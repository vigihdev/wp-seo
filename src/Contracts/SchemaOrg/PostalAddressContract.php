<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg;

interface PostalAddressContract
{
    public function getType(): string;
    public function getStreetAddress(): string;
    public function getAddressLocality(): string;
    public function getAddressCountry(): string;
    public function getAddressRegion(): string;
    public function getPostalCode(): string;
}
