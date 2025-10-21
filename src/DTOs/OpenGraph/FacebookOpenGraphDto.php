<?php

declare(strict_types=1);

namespace WpSeo\DTOs\OpenGraph;

use WpSeo\Contracts\OpenGraph\FacebookOpenGraphContract;

final class FacebookOpenGraphDto implements FacebookOpenGraphContract
{

    public function __construct(
        private readonly string $app_id
    ) {}

    public function getAppId(): string
    {
        return $this->app_id;
    }
}
