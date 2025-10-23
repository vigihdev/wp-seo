<?php

declare(strict_types=1);

namespace WpSeo\Services\SchemaOrg;

use WpSeo\Contracts\Wp\WpPostInfoContract;
use WpSeo\DTOs\SchemaOrg\BreadcrumbListDto;
use WpSeo\Renderers\SchemaOrg\BreadcrumbListRenderer;
use WpSeo\Services\BaseService;

final class BreadcrumbList extends BaseService
{

    public function __construct(
        private readonly WpPostInfoContract $post
    ) {}

    public function render(): string
    {

        if (!$this->post->getKategori()) {
            return '';
        }

        $items = [
            new BreadcrumbListDto(
                position: 1,
                name: 'Home',
                item: $this->post->getSiteInfo()->getUrl(),
            ),
            new BreadcrumbListDto(
                position: 2,
                name: $this->post->getKategori()->getName(),
                item: $this->post->getKategori()->getUrl(),
            ),
        ];

        $breadcrumb = new BreadcrumbListRenderer();
        $breadcrumb->addItems($items);
        return $breadcrumb->render();
    }
}
