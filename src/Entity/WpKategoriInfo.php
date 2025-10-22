<?php

declare(strict_types=1);

namespace WpSeo\Entity;

use WP_Term;
use WpSeo\Contracts\Wp\WpKategoriContract;

final class WpKategoriInfo implements WpKategoriContract
{

    public function __construct(
        private readonly WP_Term $wpTerm
    ) {}

    public function getName(): string
    {
        return $this->wpTerm->name;
    }

    public function getSlug(): string
    {
        return $this->wpTerm->slug;
    }

    public function getUrl(): string
    {
        return get_category_link($this->wpTerm->term_id);
    }
}
