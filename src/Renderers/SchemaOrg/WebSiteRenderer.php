<?php

declare(strict_types=1);

namespace WpSeo\Renderers\SchemaOrg;

use Spatie\SchemaOrg\Schema;
use WpSeo\DTOs\SchemaOrg\WebSiteDto;

final class WebSiteRenderer extends BaseSchemaOrgRenderer
{

    public function __construct(
        private readonly WebSiteDto $webSite
    ) {}


    public function render(): string
    {

        return Schema::webSite()
            ->setProperty('@id', $this->schemaIdGenerator('website'))
            ->name($this->webSite->getName())
            ->url($this->webSite->getUrl())
            ->description($this->webSite->getDescription())
            ->potentialAction(
                Schema::searchAction()
                    ->query($this->webSite->getPotentialAction()->getQueryInput())
                    ->target($this->webSite->getPotentialAction()->getTarget())
            )
            ->toScript();
    }
}
