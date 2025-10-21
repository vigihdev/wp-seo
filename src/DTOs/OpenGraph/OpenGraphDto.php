<?php

declare(strict_types=1);

namespace WpSeo\DTOs\OpenGraph;

use WpSeo\Contracts\OpenGraph\OpenGraphContract;
use WpSeo\DTOs\BaseDto;

final class OpenGraphDto extends BaseDto implements OpenGraphContract
{
    public function __construct(
        private readonly string $title,
        private readonly string $description,
        private readonly string $type,
        private readonly string $url,
        private readonly string $imageUrl,
        private readonly ?string $siteName = null,
        private readonly ?string $locale = null,
        private readonly ?int $imageWidth = null,
        private readonly ?int $imageHeight = null
    ) {}

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function getSiteName(): ?string
    {
        return $this->siteName;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function getImageWidth(): ?int
    {
        return $this->imageWidth;
    }

    public function getImageHeight(): ?int
    {
        return $this->imageHeight;
    }
}
