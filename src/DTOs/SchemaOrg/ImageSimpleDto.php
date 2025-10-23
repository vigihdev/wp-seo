<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg;

use WpSeo\Contracts\SchemaOrg\ImageSimpleContract;
use WpSeo\DTOs\BaseDto;

final class ImageSimpleDto extends BaseDto implements ImageSimpleContract
{
    public function __construct(
        private readonly string $imageUrl,
    ) {}

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }
}
