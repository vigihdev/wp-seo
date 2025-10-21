<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg;

use WpSeo\Contracts\SchemaOrg\LocalBusiness\PostalAddressContract;

interface OrganizationContract
{
    public function getContext(): string;
    public function getType(): string;
    public function getUrl(): string;

    /**
     * @return string[]
     */
    public function getSameAs(): array;

    public function getLogo(): string;
    public function getName(): string;
    public function getDescription(): string;
    public function getEmail(): string;
    public function getTelephone(): string;
    public function getAddress(): PostalAddressContract;
    public function getVatID(): ?string;
    public function getIso6523Code(): ?string;
}
