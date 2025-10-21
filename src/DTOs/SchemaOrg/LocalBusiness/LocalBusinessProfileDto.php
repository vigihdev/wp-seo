<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg\LocalBusiness;

use WpSeo\Contracts\SchemaOrg\LocalBusiness\{LocalBusinessProfileContract};
use WpSeo\DTOs\BaseDto;

final class LocalBusinessProfileDto extends BaseDto implements LocalBusinessProfileContract
{

    public function __construct(
        private readonly string $name,
        private readonly string $description,
        private readonly string $url,
        private readonly string $telephone,
        private readonly string $email,
        private readonly array $image,
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

    public function getImage(): array
    {
        return $this->image;
    }

    public function getPriceRange(): string
    {
        return $this->priceRange;
    }
}
