<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg\LocalBusiness;

interface OpeningHoursContract
{
    /**
     * Hari dalam format "Monday", "Tuesday", etc.
     * atau "PublicHolidays"
     */
    public function getDayOfWeek(): string;

    /**
     * Jam buka dalam format "HH:MM" (24-hour)
     */
    public function getOpens(): string;

    /**
     * Jam tutup dalam format "HH:MM" (24-hour) 
     */
    public function getCloses(): string;

    /**
     * Untuk special cases seperti "00:00" untuk 24 jam
     */
    public function is24Hours(): bool;

    /**
     * Untuk hari libur/tutup khusus
     */
    public function isClosed(): bool;
}
