<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg;

use WpSeo\Contracts\SchemaOrg\VacationRentalContract;
use WpSeo\DTOs\BaseDto;

final class VacationRentalDto extends BaseDto implements VacationRentalContract
{
    /**
     * @param string[] $image
     * @param string[] $knowsLanguage
     * @param ReviewDto[] $review
     */
    public function __construct(
        private readonly string $additionalType,
        private readonly BrandDto $brand,
        private readonly AccommodationDto $containsPlace,
        private readonly string $identifier,
        private readonly string $latitude,
        private readonly string $longitude,
        private readonly string $name,
        private readonly PostalAddressDto $address,
        private readonly AggregateRatingDto $aggregateRating,
        private readonly array $image,
        private readonly string $checkinTime,
        private readonly string $checkoutTime,
        private readonly string $description,
        private readonly array $knowsLanguage,
        private readonly array $review,
        private readonly string $context = 'https://schema.org',
        private readonly string $type = 'VacationRental'
    ) {}

    public function getContext(): string
    {
        return $this->context;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getAdditionalType(): string
    {
        return $this->additionalType;
    }

    public function getBrand(): BrandDto
    {
        return $this->brand;
    }

    public function getContainsPlace(): AccommodationDto
    {
        return $this->containsPlace;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function getLatitude(): string
    {
        return $this->latitude;
    }

    public function getLongitude(): string
    {
        return $this->longitude;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): PostalAddressDto
    {
        return $this->address;
    }

    public function getAggregateRating(): AggregateRatingDto
    {
        return $this->aggregateRating;
    }

    public function getImage(): array
    {
        return $this->image;
    }

    public function getCheckinTime(): string
    {
        return $this->checkinTime;
    }

    public function getCheckoutTime(): string
    {
        return $this->checkoutTime;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getKnowsLanguage(): array
    {
        return $this->knowsLanguage;
    }

    public function getReview(): array
    {
        return $this->review;
    }
}
