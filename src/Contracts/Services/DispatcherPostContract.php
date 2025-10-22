<?php

declare(strict_types=1);

namespace WpSeo\Contracts\Services;

interface DispatcherPostContract
{
    public function buildForPost(int $postId): string;
}
