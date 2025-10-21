<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg;

use WpSeo\Contracts\SchemaOrg\{WebSiteContract, PotentialActionContract};
use WpSeo\DTOs\BaseDto;

final class WebSiteDto extends BaseDto implements WebSiteContract
{

    public function __construct(
        private readonly string $name,
        private readonly string $description,
        private readonly string $url,
        private readonly ?PotentialActionDto $potentialAction = null,
        private readonly ?string $alternateName = null,
        private readonly ?string $inLanguage = null,
        private readonly ?string $copyrightYear = null
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getPotentialAction(): ?PotentialActionContract
    {
        return $this->potentialAction;
    }

    public function getAlternateName(): ?string
    {
        return $this->alternateName;
    }

    public function getInLanguage(): ?string
    {
        return $this->inLanguage;
    }

    public function getCopyrightYear(): ?string
    {
        return $this->copyrightYear;
    }
}
