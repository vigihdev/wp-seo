<?php

declare(strict_types=1);

namespace WpSeo\Renderers\SchemaOrg;

use Spatie\SchemaOrg\Schema;
use WpSeo\DTOs\SchemaOrg\OrganizationDto;

final class OrganizationRenderer extends BaseSchemaOrgRenderer
{

    public function __construct(
        private readonly OrganizationDto $organization
    ) {}

    public function render(): string
    {

        $org = $this->organization;
        $address = $org->getAddress();

        return Schema::organization()
            ->setProperty('@id', $this->schemaIdGenerator('organization'))
            ->name($org->getName())
            ->email($org->getEmail())
            ->logo($org->getLogo())
            ->telephone($org->getTelephone())
            ->image($org->getImage())
            ->address(
                Schema::postalAddress()
                    ->streetAddress($address->getStreetAddress())
                    ->addressLocality($address->getAddressLocality())
                    ->addressRegion($address->getAddressRegion())
                    ->postalCode($address->getPostalCode())
                    ->addressCountry($address->getAddressCountry())
            )
            ->sameAs($org->getSameAs())
            ->toScript();
    }
}
