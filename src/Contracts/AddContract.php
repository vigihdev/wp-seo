<?php

declare(strict_types=1);

namespace WpSeo\Contracts;

interface AddContract
{
    public function addItem(mixed $item): self;

    public function addItems(array $items): self;
}
