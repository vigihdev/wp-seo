<?php

declare(strict_types=1);

namespace WpSeo;


class RemoveFeed
{

    public static function render(): void
    {

        add_action('wp_head', function () {
            remove_action('wp_head', 'feed_links', 2);
            remove_action('wp_head', 'feed_links_extra', 3);
        }, 1);
    }

    public function __construct() {}

    public function disableFeed()
    {
        wp_die(__('No feed available,please visit our homepage!'));
    }
}
