<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg;

interface ImageContract
{
    public function getImageUrl(): string;
    public function getWidth(): ?int;
    public function getHeight(): ?int;
    public function getCaption(): ?string;
}
