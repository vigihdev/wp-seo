<?php

declare(strict_types=1);

namespace WpSeo\Renderers\SchemaOrg;

use Spatie\SchemaOrg\Schema;
use WpSeo\DTOs\SchemaOrg\AggregateRatingDto;
use WpSeo\DTOs\SchemaOrg\LocalBusiness\{GeoCoordinatesDto, LocalBusinessProfileDto, OpeningHoursSpecificationDto, PostalAddressDto};
use WpSeo\DTOs\SchemaOrg\ReviewDto;

final class LocalBusinessRenderer extends BaseSchemaOrgRenderer
{

    /**
     *
     * @param LocalBusinessProfileDto $businessProfile
     * @param PostalAddressDto|null $address
     * @param GeoCoordinatesDto|null $geo
     * @param AggregateRatingDto|null $aggregateRating
     * @param ReviewDto[] $review
     * @param OpeningHoursSpecificationDto[] $openingHours
     * @return void
     */
    public function __construct(
        private readonly LocalBusinessProfileDto $businessProfile,
        private readonly ?PostalAddressDto $address = null,
        private readonly ?GeoCoordinatesDto $geo = null,
        private readonly ?AggregateRatingDto $aggregateRating = null,
        private readonly array $review = [],
        private readonly array $openingHours = [],
    ) {}

    public function render(): string
    {

        $profile = $this->businessProfile;
        $localBusiness = Schema::localBusiness()
            ->setProperty('@id', $this->schemaIdGenerator('localBusiness'))
            ->name($profile->getName())
            ->url($profile->getUrl())
            ->email($profile->getEmail())
            ->priceRange($profile->getPriceRange())
            ->telephone($profile->getTelephone())
            ->image($profile->getImage());

        if ($this->address) {
            $localBusiness->address(
                Schema::postalAddress()
                    ->streetAddress($this->address->getStreetAddress())
                    ->addressLocality($this->address->getAddressLocality())
                    ->addressRegion($this->address->getAddressRegion())
                    ->postalCode($this->address->getPostalCode())
                    ->addressCountry($this->address->getAddressCountry())
            );
        }

        if ($this->geo) {
            $localBusiness->geo(
                Schema::geoCoordinates()
                    ->latitude($this->geo->getLatitude())
                    ->longitude($this->geo->getLongitude())
            );
        }

        if (!empty($this->openingHours)) {
            $openingHours = [];
            foreach ($this->openingHours as $opening) {
                if ($opening instanceof OpeningHoursSpecificationDto) {
                    $openingHours[] = Schema::openingHoursSpecification()
                        ->dayOfWeek($opening->getDayOfWeek())
                        ->opens($opening->getOpens())
                        ->closes($opening->getCloses());
                }
            }

            if (!empty($openingHours)) {
                $localBusiness->openingHoursSpecification($openingHours);
            }
        }

        if ($this->aggregateRating) {
            $localBusiness->aggregateRating(
                Schema::aggregateRating()
                    ->bestRating($this->aggregateRating->getBestRating())
                    ->worstRating($this->aggregateRating->getWorstRating())
                    ->ratingCount($this->aggregateRating->getRatingCount())
                    ->ratingValue($this->aggregateRating->getRatingValue())
                    ->reviewCount($this->aggregateRating->getReviewCount())
            );

            if (!empty($this->review)) {
                $reviews = [];
                foreach ($this->review as $review) {
                    if ($review instanceof ReviewDto) {
                        $reviews[] = Schema::review()
                            ->author(
                                Schema::person()
                                    ->name($review->getAuthor()->getName())
                                    ->url($review->getAuthor()->getUrl())
                            )
                            ->reviewRating(
                                Schema::rating()
                                    ->bestRating($review->getReviewRating()->getBestRating())
                                    ->ratingValue($review->getReviewRating()->getRatingValue())
                                    ->worstRating($this->aggregateRating->getWorstRating())
                            )
                            ->datePublished($review->getDatePublished())
                            ->reviewBody($review->getReviewBody());
                    }
                }

                if (!empty($reviews)) {
                    $localBusiness->review($reviews);
                }
            }
        }

        return $localBusiness->toScript();
    }
}
