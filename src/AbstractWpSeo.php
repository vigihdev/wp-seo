<?php

declare(strict_types=1);

namespace WpSeo;

use WP_Post;
use WP_Term;

abstract class AbstractWpSeo implements PostInterface
{
    protected ?WP_Post $post;

    abstract public function render(): string;

    public static function create(?WP_Post $post = null): string
    {
        return (new static($post))->render();
    }

    public function __construct(?WP_Post $post = null)
    {
        $this->post = $post ?? get_post();
    }

    public function getId(): int
    {
        return (int)$this->post->ID;
    }

    public function getPostAuthor(): string
    {
        return $this->post->post_author;
    }

    public function getPostContent(): string
    {
        return $this->post->post_content;
    }

    public function getPostTitle(): string
    {
        return $this->post->post_title;
    }

    public function getPostStatus(): string
    {
        return $this->post->post_status;
    }

    public function getPostType(): string
    {
        return $this->post->post_type;
    }

    public function getPostName(): string
    {
        return $this->post->post_name;
    }

    protected function getPost(): ?WP_Post
    {
        return $this->post;
    }

    /**
     *
     * @return WP_Term[]
     */
    public function getTheCategory(): array
    {
        return get_the_category($this->post->ID);
    }
}
