<?php

declare(strict_types=1);

namespace WpSeo\Contracts\Wp;

interface WpKategoriContract
{

    public function getName(): string;
    public function getUrl(): string;
    public function getSlug(): string;
}
