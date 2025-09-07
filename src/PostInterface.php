<?php

declare(strict_types=1);

namespace WpSeo;

interface PostInterface
{
    public function getId(): int;

    public function getPostAuthor(): string;

    public function getPostContent(): string;

    public function getPostTitle(): string;

    public function getPostStatus(): string;

    public function getPostType(): string;

    public function getPostName(): string;

    public function getTheCategory(): array;
}
