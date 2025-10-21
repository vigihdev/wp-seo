<?php

declare(strict_types=1);

namespace WpSeo\Contracts\SchemaOrg;

interface ReviewContract
{
    public function getType(): string;
    public function getReviewRating(): RatingContract;
    public function getAuthor(): AuthorContract;
    public function getReviewBody(): string;
    public function getDatePublished(): string;
    public function getContentReferenceTime(): string;
}
