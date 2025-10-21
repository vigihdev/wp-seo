<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg;

interface AccommodationContract
{
    public function getType(): string;
    public function getAdditionalType(): string;

    /**
     * @return BedDetailsContract[]
     */
    public function getBed(): array;

    public function getOccupancy(): QuantitativeValueContract;

    /**
     * @return LocationFeatureSpecificationContract[]
     */
    public function getAmenityFeature(): array;

    public function getFloorSize(): QuantitativeValueContract;
    public function getNumberOfBathroomsTotal(): int;
    public function getNumberOfBedrooms(): int;
    public function getNumberOfRooms(): int;
}
