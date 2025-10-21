<?php

declare(strict_types=1);

namespace WpSeo\Contracts;

interface RendererContract
{
    public function render(): string;
}
