<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg;

use WpSeo\Contracts\SchemaOrg\ImageContract;
use WpSeo\DTOs\BaseDto;

final class ImageDto extends BaseDto implements ImageContract
{
    public function __construct(
        private readonly string $imageUrl,
        private readonly ?int $width = null,
        private readonly ?int $height = null,
        private readonly ?string $caption = null
    ) {}

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function getCaption(): ?string
    {
        return $this->caption;
    }
}
