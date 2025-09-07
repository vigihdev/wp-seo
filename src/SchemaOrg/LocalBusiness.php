<?php

declare(strict_types=1);

namespace WpSeo\SchemaOrg;

use Spatie\SchemaOrg\Schema;
use WpSeo\AbstractWpSeo;

final class LocalBusiness extends AbstractWpSeo
{


    public function render(): string
    {
        return $this->generate();
    }

    private function generate(array $businessData = []): string
    {
        $defaults = [
            'name' => get_bloginfo('name'),
            'description' => get_bloginfo('description'),
            'url' => home_url(),
            'telephone' => '',
            'address' => [
                'streetAddress' => '',
                'addressLocality' => '',
                'addressRegion' => '',
                'postalCode' => '',
                'addressCountry' => 'ID'
            ],
            'openingHours' => ['Mo-Fr 09:00-17:00'],
            'priceRange' => '$$'
        ];

        $data = array_merge($defaults, $businessData);

        return Schema::localBusiness()
            ->name($data['name'])
            ->description($data['description'])
            ->url($data['url'])
            ->telephone($data['telephone'])
            ->address(
                Schema::postalAddress()
                    ->streetAddress($data['address']['streetAddress'])
                    ->addressLocality($data['address']['addressLocality'])
                    ->addressRegion($data['address']['addressRegion'])
                    ->postalCode($data['address']['postalCode'])
                    ->addressCountry($data['address']['addressCountry'])
            )
            ->openingHours($data['openingHours'])
            ->priceRange($data['priceRange'])
            ->toScript();
    }
}
