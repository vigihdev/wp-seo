<?php

declare(strict_types=1);

namespace WpSeo\Contracts\OpenGraph;

interface ImageContract
{
    public function getType(): string;
    public function getWidth(): int;
    public function getHeight(): int;
}
