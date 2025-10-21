<?php

declare(strict_types=1);

namespace WpSeo\Contracts\OpenGraph;

interface TwitterCardContract
{
    public function getCard(): string;
    public function getSite(): string;
    public function getCreator(): string;
}
