<?php

declare(strict_types=1);

namespace WpSeo\DTOs\SchemaOrg;

use WpSeo\Contracts\SchemaOrg\ReviewContract;
use WpSeo\DTOs\BaseDto;

final class ReviewDto extends BaseDto implements ReviewContract
{
    public function __construct(
        private readonly RatingDto $reviewRating,
        private readonly AuthorDto $author,
        private readonly string $reviewBody,
        private readonly string $datePublished,
        private readonly string $contentReferenceTime,
        private readonly string $type = 'Review'
    ) {}

    public function getType(): string
    {
        return $this->type;
    }

    public function getReviewRating(): RatingDto
    {
        return $this->reviewRating;
    }

    public function getAuthor(): AuthorDto
    {
        return $this->author;
    }

    public function getReviewBody(): string
    {
        return $this->reviewBody;
    }

    public function getDatePublished(): string
    {
        return $this->datePublished;
    }

    public function getContentReferenceTime(): string
    {
        return $this->contentReferenceTime;
    }
}
