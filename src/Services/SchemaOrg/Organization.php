<?php

declare(strict_types=1);

namespace WpSeo\Services\SchemaOrg;

use WpSeo\DTOs\SchemaOrg\OrganizationDto;
use WpSeo\Renderers\SchemaOrg\OrganizationRenderer;
use WpSeo\Services\BaseJsonService;

final class Organization extends BaseJsonService
{

    public function __construct()
    {
        parent::__construct(
            fileNameJson: 'schema-org/organization.json'
        );
    }

    public function render(): string
    {
        $organization = new OrganizationRenderer(
            organization: $this->getDtoFromJson(OrganizationDto::class)
        );
        return $organization->render();
    }
}
