<?php

declare(strict_types=1);


namespace WpSeo;

use WpSeo\BaseWpSeo;
use Yiisoft\Html\Html;

final class MetaLink extends BaseWpSeo
{


    /**
     *
     * @return string|null
     */
    public static function render(): ?string
    {
        return (new self())->run();
    }

    /**
     *
     * @return string|null
     */
    protected function run(): ?string
    {

        return implode(PHP_EOL, [
            // Html::MetaLink('icon', esc_url(get_template_directory_uri()) . "/favicon.ico", 'image/x-icon'),
            // Html::MetaLink('shortcut icon', esc_url(get_template_directory_uri()) . "/favicon.ico", 'image/x-icon'),
            // Html::MetaLink('manifest', '/manifest.json', null),
            // Html::MetaLink('pingback', esc_url(get_bloginfo('pingback_url')), null),
            // Html::MetaLink('profile', 'https://gmpg.org/xfn/11', null),
            // Html::tag('link', null, ['rel' => 'preconnect', 'href' => 'https://fonts.gstatic.com', 'crossorigin' => true]),
            // Html::tag('link', null, ['rel' => 'preconnect', 'href' => 'https://fonts.gstatic.com']),
            // $this->preloadFonts(),
        ]);
    }

    /**
     *
     * @return string
     */
    private function preloadFonts(): string
    {


        $fontsUrls = [
            'https://fonts.gstatic.com/s/poppins/v21/pxiByp8kv8JHgFVrLGT9Z1xlFd2JQEk.woff2',
            'https://fonts.gstatic.com/s/poppins/v21/pxiEyp8kv8JHgFVrJJfecnFHGPc.woff2',
            'https://fonts.gstatic.com/s/poppins/v21/pxiByp8kv8JHgFVrLCz7Z1xlFd2JQEk.woff2',
            'https://fonts.gstatic.com/s/materialiconsoutlined/v108/gok-H7zzDkdnRel8-DQ6KAXJ69wP1tGnf4ZGhUcel5euIg.woff2',
        ];

        $preloads = [];
        // foreach ($fontsUrls as $fontsUrl) {
        //     $preloads[] = Html::tag('link', null, [
        //         'rel' => 'preload',
        //         'href' => $fontsUrl,
        //         'type' => 'font/woff2',
        //         'as' => 'font',
        //         'crossorigin' => true
        //     ]);
        // }

        return implode(PHP_EOL, $preloads);
    }
}
