<?php

declare(strict_types=1);

namespace WpSeo\Services\SchemaOrg;

use WpSeo\Services\BaseJsonService;
use WpSeo\DTOs\SchemaOrg\{AggregateRatingDto, ReviewDto};
use WpSeo\DTOs\SchemaOrg\LocalBusiness\{LocalBusinessDto, LocalBusinessProfileDto, PostalAddressDto, GeoCoordinatesDto, OpeningHoursSpecificationDto};
use WpSeo\Renderers\SchemaOrg\LocalBusinessRenderer;

final class LocalBusiness extends BaseJsonService
{

    private static $basepath = 'schema-org/local-business';

    public function __construct()
    {
        parent::__construct(
            fileNameJson: self::$basepath . "/business-profile.json"
        );
    }

    public function render(): string
    {

        $localBusiness = new LocalBusinessRenderer(
            businessProfile: $this->getDtoFromJson(LocalBusinessProfileDto::class),
            address: $this->dtoTransformer(PostalAddressDto::class, self::$basepath . '/postal-address.json'),
            geo: $this->dtoTransformer(GeoCoordinatesDto::class, self::$basepath . '/geo-coordinates.json'),
            openingHours: $this->dtoTransformer(OpeningHoursSpecificationDto::class, self::$basepath . '/24-7.json'),
            aggregateRating: $this->dtoTransformer(AggregateRatingDto::class, self::$basepath . '/aggregate-rating.json'),
            review: $this->dtoTransformer(ReviewDto::class, self::$basepath . '/review.json')
        );

        return $localBusiness->render();
    }
}
