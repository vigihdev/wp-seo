<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg;

interface WebSiteContract
{
    public function getName(): string;
    public function getDescription(): string;
    public function getUrl(): string;
    public function getPotentialAction(): ?PotentialActionContract;
    public function getAlternateName(): ?string;
    public function getInLanguage(): ?string;
    public function getCopyrightYear(): ?string;
}
