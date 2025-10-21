<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg\LocalBusiness;

interface OpeningHoursSpecificationContract
{
    public function getDayOfWeek(): string;
    public function getOpens(): string;
    public function getCloses(): string;
}
