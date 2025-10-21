<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg\LocalBusiness;

use WpSeo\Contracts\SchemaOrg\LocalBusiness\OpeningHoursSpecificationContract;
use WpSeo\DTOs\BaseDto;

final class OpeningHoursSpecificationDto extends BaseDto implements OpeningHoursSpecificationContract
{

    public function __construct(
        private readonly string $dayOfWeek,
        private readonly string $opens,
        private readonly string $closes
    ) {

        // Validasi format waktu
        if (!$this->isValidTime($opens) || !$this->isValidTime($closes)) {
            throw new \InvalidArgumentException('Invalid time format');
        }
    }

    public function getDayOfWeek(): string
    {
        return $this->dayOfWeek;
    }

    public function getOpens(): string
    {
        return $this->opens;
    }

    public function getCloses(): string
    {
        return $this->closes;
    }

    private function isValidTime(string $time): bool
    {
        return preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/', $time) === 1;
    }
}
