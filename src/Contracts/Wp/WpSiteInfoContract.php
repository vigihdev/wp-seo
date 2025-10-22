<?php

declare(strict_types=1);

namespace WpSeo\Contracts\Wp;

interface WpSiteInfoContract
{

    public function getUrl(): string;
    public function getDescription(): string;
    public function getTitle(): string;
}
