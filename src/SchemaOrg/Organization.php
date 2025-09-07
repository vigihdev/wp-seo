<?php

declare(strict_types=1);

namespace WpSeo\SchemaOrg;

use Spatie\SchemaOrg\Schema;
use WpSeo\AbstractWpSeo;

final class Organization extends AbstractWpSeo
{


    public function render(): string
    {
        return $this->generate();
    }

    private function generate(array $orgData = []): string
    {
        $defaults = [
            'name' => get_bloginfo('name'),
            'description' => get_bloginfo('description'),
            'url' => home_url(),
            'logo' => '',
            'sameAs' => [],
            'contactPoint' => [
                'telephone' => '',
                'contactType' => 'customer service'
            ]
        ];

        $data = array_merge($defaults, $orgData);

        $organization = Schema::organization()
            ->name($data['name'])
            ->description($data['description'])
            ->url($data['url']);

        if (!empty($data['logo'])) {
            $organization->logo($data['logo']);
        }

        if (!empty($data['sameAs'])) {
            $organization->sameAs($data['sameAs']);
        }

        if (!empty($data['contactPoint']['telephone'])) {
            $organization->contactPoint(
                Schema::contactPoint()
                    ->telephone($data['contactPoint']['telephone'])
                    ->contactType($data['contactPoint']['contactType'])
            );
        }

        return $organization->toScript();
    }
}
