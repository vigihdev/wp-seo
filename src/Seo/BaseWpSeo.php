<?php

declare(strict_types=1);

namespace WpSeo;

use WP_Post;

abstract class BaseWpSeo
{

    /**
     * @var WP_Post $post
     */
    public $post;

    /**
     *
     * @return string
     */
    abstract public static function render(): ?string;

    /**
     *
     * @return string|null
     */
    abstract protected function run(): ?string;


    /**
     *
     * @param mixed $data
     * @return void
     */
    public function __construct($data = null)
    {

        if (is_object($data)) {
            $data = get_object_vars($data);
        }

        if (is_array($data) && !empty($data)) {
            foreach ($data as $name => $value) {
                if (is_string($name) && property_exists($this, $name)) {
                    $this->$name = $value;
                }
            }
        }

        global $post;
        if ($post instanceof WP_Post) {
            $this->post = $post;
        }

        $this->init();
    }

    public function init() {}
}
