<?php

declare(strict_types=1);

namespace WpSeo\Seo;

use WpSeo\AbstractWpSeo;
use Yiisoft\Html\Tag\Link;

final class MetaLink extends AbstractWpSeo
{


    public function render(): string
    {
        return implode(PHP_EOL, [
            Link::tag()->rel('icon')->type('image/x-icon')->href(esc_url(get_template_directory_uri()) . "/favicon.ico")->render(),
            Link::tag()->rel('shortcut icon')->type('image/x-icon')->href(esc_url(get_template_directory_uri()) . "/favicon.ico")->render(),
            Link::tag()->rel('manifest')->href('/manifest.json')->render(),
            Link::tag()->rel('pingback')->href(esc_url(get_bloginfo('pingback_url')))->render(),
            Link::tag()->rel('profile')->href('https://gmpg.org/xfn/11')->render(),
        ]);
    }
}
