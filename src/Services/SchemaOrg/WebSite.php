<?php

declare(strict_types=1);

namespace WpSeo\Services\SchemaOrg;

use WpSeo\Services\BaseJsonService;
use WpSeo\DTOs\SchemaOrg\WebSiteDto;
use WpSeo\Renderers\SchemaOrg\WebSiteRenderer;

final class WebSite extends BaseJsonService
{

    public function __construct()
    {
        parent::__construct(
            fileNameJson: 'schema-org/web-site.json'
        );
    }

    public function render(): string
    {
        $webSite = new WebSiteRenderer(
            webSite: $this->getDtoFromJson(WebSiteDto::class)
        );
        return $webSite->render();
    }
}
