<?php

declare(strict_types=1);

namespace WpSeo;

abstract class AbstractWpSeo
{
    abstract public function render(): string;

    public static function create(): string
    {
        return (new static())->render();
    }
}
