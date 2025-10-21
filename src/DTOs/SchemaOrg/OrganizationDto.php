<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg;

use WpSeo\Contracts\SchemaOrg\OrganizationContract;
use WpSeo\DTOs\BaseDto;
use WpSeo\DTOs\SchemaOrg\LocalBusiness\PostalAddressDto;

final class OrganizationDto extends BaseDto implements OrganizationContract
{
    /**
     * @param string[] $sameAs
     */
    public function __construct(
        private readonly string $url,
        private readonly array $sameAs,
        private readonly string $logo,
        private readonly string $name,
        private readonly string $description,
        private readonly string $email,
        private readonly string $telephone,
        private readonly array $image,
        private readonly PostalAddressDto $address,
        private readonly ?string $vatID = null,
        private readonly ?string $iso6523Code = null,
        private readonly string $context = 'https://schema.org',
        private readonly string $type = 'Organization'
    ) {}

    public function getContext(): string
    {
        return $this->context;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getSameAs(): array
    {
        return $this->sameAs;
    }

    public function getLogo(): string
    {
        return $this->logo;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     *
     * @return string[]
     */
    public function getImage(): array
    {
        return $this->image;
    }

    public function getAddress(): PostalAddressDto
    {
        return $this->address;
    }

    public function getVatID(): ?string
    {
        return $this->vatID;
    }

    public function getIso6523Code(): ?string
    {
        return $this->iso6523Code;
    }
}
