<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg\LocalBusiness;

use WpSeo\Contracts\SchemaOrg\LocalBusiness\OpeningHoursContract;
use WpSeo\DTOs\BaseDto;

final class OpeningHoursDto extends BaseDto implements OpeningHoursContract
{

    public function __construct(
        private readonly string $dayOfWeek,
        private readonly string $opens,
        private readonly string $closes,
        private readonly bool $is24Hours = false,
        private readonly bool $isClosed = false
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

    public function is24Hours(): bool
    {
        return $this->is24Hours;
    }

    public function isClosed(): bool
    {
        return $this->isClosed;
    }

    private function isValidTime(string $time): bool
    {
        return preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/', $time) === 1;
    }
}
