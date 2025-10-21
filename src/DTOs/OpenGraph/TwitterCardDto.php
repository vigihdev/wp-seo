<?php

declare(strict_types=1);

namespace WpSeo\DTOs\OpenGraph;

use WpSeo\Contracts\OpenGraph\TwitterCardContract;
use WpSeo\DTOs\BaseDto;

final class TwitterCardDto extends BaseDto implements TwitterCardContract
{
    public function __construct(
        private readonly string $card,
        private readonly string $site,
        private readonly string $creator
    ) {}

    public function getCard(): string
    {
        return $this->card;
    }

    public function getSite(): string
    {
        return $this->site;
    }

    public function getCreator(): string
    {
        return $this->creator;
    }
}
