<?php

declare(strict_types=1);

namespace WpSeo\Contracts\Wp;

use WpSeo\Contracts\Meta\SeoMetaContract;

interface WpPostInfoContract extends SeoMetaContract
{

    public function getUrl(): string;
    public function getFeaturedImage(): ?string;
    public function getAuthorInfo(): ?WpAuthorContract;
    public function getKategori(): ?WpKategoriContract;
    public function getSiteInfo(): WpSiteInfoContract;
}
