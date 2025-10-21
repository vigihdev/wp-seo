<?php

declare(strict_types=1);

namespace WpSeo\Renderers\SchemaOrg;

use WpSeo\DTOs\SchemaOrg\VacationRentalDto;
use WpSeo\Renderers\BaseRenderer;

final class VacationRentalRenderer extends BaseSchemaOrgRenderer
{
    private ?VacationRentalDto $vacationRental = null;

    public function setVacationRental(VacationRentalDto $vacationRental): self
    {
        $this->vacationRental = $vacationRental;
        return $this;
    }

    public function render(): string
    {

        if ($this->vacationRental === null) {
            return '';
        }

        $schema = $this->buildSchema($this->vacationRental);

        return sprintf(
            '<script type="application/ld+json">%s</script>',
            json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );
    }

    private function buildSchema(VacationRentalDto $dto): array
    {
        return [
            '@context' => $dto->getContext(),
            '@type' => $dto->getType(),
            'additionalType' => $dto->getAdditionalType(),
            'brand' => $dto->getBrand()->toArray(),
            'containsPlace' => $this->buildAccommodation($dto->getContainsPlace()),
            'identifier' => $dto->getIdentifier(),
            'latitude' => $dto->getLatitude(),
            'longitude' => $dto->getLongitude(),
            'name' => $dto->getName(),
            'address' => $dto->getAddress()->toArray(),
            'aggregateRating' => $dto->getAggregateRating()->toArray(),
            'image' => $dto->getImage(),
            'checkinTime' => $dto->getCheckinTime(),
            'checkoutTime' => $dto->getCheckoutTime(),
            'description' => $dto->getDescription(),
            'knowsLanguage' => $dto->getKnowsLanguage(),
            // 'review' => array_map(fn($r) => $r->toArray(), $dto->getReview())
        ];
    }

    private function buildAccommodation($accommodation): array
    {
        $data = $accommodation->toArray();

        // Ensure nested arrays are properly formatted
        $data['bed'] = array_map(fn($b) => $b->toArray(), $accommodation->getBed());
        $data['amenityFeature'] = array_map(fn($a) => $a->toArray(), $accommodation->getAmenityFeature());

        return $data;
    }
}
