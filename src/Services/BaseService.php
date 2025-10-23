<?php

declare(strict_types=1);

namespace WpSeo\Services;

abstract class BaseService
{

    abstract public function render(): string;
}
