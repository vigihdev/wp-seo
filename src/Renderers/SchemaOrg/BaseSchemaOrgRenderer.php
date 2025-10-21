<?php

declare(strict_types=1);

namespace WpSeo\Renderers\SchemaOrg;


abstract class BaseSchemaOrgRenderer
{

    abstract public function render(): string;

    protected function schemaIdGenerator(string $id, ?string $base = null): string
    {
        $baseUrl = $base ? rtrim($base, '/') : rtrim(home_url(), '/');
        $normalizedId = ltrim($id, "#/");

        return "{$baseUrl}#{$normalizedId}";
    }
}
