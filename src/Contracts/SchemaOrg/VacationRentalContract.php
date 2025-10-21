<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg;

interface VacationRentalContract
{
    public function getContext(): string;
    public function getType(): string;
    public function getAdditionalType(): string;
    public function getBrand(): BrandContract;
    public function getContainsPlace(): AccommodationContract;
    public function getIdentifier(): string;
    public function getLatitude(): string;
    public function getLongitude(): string;
    public function getName(): string;
    public function getAddress(): PostalAddressContract;
    public function getAggregateRating(): AggregateRatingContract;

    /**
     * @return string[]
     */
    public function getImage(): array;

    public function getCheckinTime(): string;
    public function getCheckoutTime(): string;
    public function getDescription(): string;

    /**
     * @return string[]
     */
    public function getKnowsLanguage(): array;

    /**
     * @return ReviewContract[]
     */
    public function getReview(): array;
}
