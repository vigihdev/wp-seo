<?php

declare(strict_types=1);

namespace WpSeo\Renderers\OpenGraph;

abstract class BaseOpenGraphRenderer
{

    abstract public function render(): string;
}
