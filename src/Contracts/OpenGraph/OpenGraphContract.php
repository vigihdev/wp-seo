<?php

declare(strict_types=1);

namespace WpSeo\Contracts\OpenGraph;

interface OpenGraphContract
{
    public function getTitle(): string;
    public function getDescription(): string;
    public function getType(): string;
    public function getUrl(): string;
    public function getImageUrl(): string;
    public function getSiteName(): ?string;
    public function getLocale(): ?string;
    public function getImageWidth(): ?int;
    public function getImageHeight(): ?int;
}
