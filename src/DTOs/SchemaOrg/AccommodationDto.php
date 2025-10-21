<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg;

use WpSeo\Contracts\SchemaOrg\AccommodationContract;
use WpSeo\DTOs\BaseDto;

final class AccommodationDto extends BaseDto implements AccommodationContract
{
    /**
     * @param BedDetailsDto[] $bed
     * @param LocationFeatureSpecificationDto[] $amenityFeature
     */
    public function __construct(
        private readonly string $additionalType,
        private readonly array $bed,
        private readonly QuantitativeValueDto $occupancy,
        private readonly array $amenityFeature,
        private readonly QuantitativeValueDto $floorSize,
        private readonly int $numberOfBathroomsTotal,
        private readonly int $numberOfBedrooms,
        private readonly int $numberOfRooms,
        private readonly string $type = 'Accommodation'
    ) {}

    public function getType(): string
    {
        return $this->type;
    }

    public function getAdditionalType(): string
    {
        return $this->additionalType;
    }

    public function getBed(): array
    {
        return $this->bed;
    }

    public function getOccupancy(): QuantitativeValueDto
    {
        return $this->occupancy;
    }

    public function getAmenityFeature(): array
    {
        return $this->amenityFeature;
    }

    public function getFloorSize(): QuantitativeValueDto
    {
        return $this->floorSize;
    }

    public function getNumberOfBathroomsTotal(): int
    {
        return $this->numberOfBathroomsTotal;
    }

    public function getNumberOfBedrooms(): int
    {
        return $this->numberOfBedrooms;
    }

    public function getNumberOfRooms(): int
    {
        return $this->numberOfRooms;
    }
}
