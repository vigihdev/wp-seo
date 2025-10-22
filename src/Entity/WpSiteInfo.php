<?php

declare(strict_types=1);

namespace WpSeo\Entity;

use WpSeo\Contracts\Wp\WpSiteInfoContract;

final class WpSiteInfo implements WpSiteInfoContract
{

    public function getUrl(): string
    {
        return get_site_url() ?: '';
    }

    public function getDescription(): string
    {
        return get_bloginfo('description') ?: '';
    }

    public function getTitle(): string
    {
        return get_bloginfo('name') ?: '';
    }
}
