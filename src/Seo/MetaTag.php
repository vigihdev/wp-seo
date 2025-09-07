<?php

declare(strict_types=1);

namespace WpSeo;

use Yiisoft\Html\Tag\{Html, Meta};

final class MetaTag extends AbstractWpSeo
{


    public function render(): string
    {
        return implode(PHP_EOL, [
            Meta::tag()->name('google-site-verification')->content('wANIFY7u5b5u0CTWr8tGSWIG4KMytYgOZS2mkAVSMSc')->render(),
            Meta::tag()->name('msvalidate.01')->content('157FF5395DA0247121C6D143E028ECA2')->render(),
            Meta::tag()->name('yandex-verification')->content('d9d90efd7492a230')->render(),
            Meta::tag()->name('facebook-domain-verification')->content('cyhv9askq1vkpnd1krz9qo015yzccl')->render(),
            Meta::tag()->name('p:domain_verify')->content('a15185b812a90cb0a2b98c0e8300386f')->render(),
            // Meta::tag()->name('assets-version')->content((string)ASSETS_VERSION)->render(),
            Meta::tag()->name('robots')->content('index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1')->render(),
            Meta::tag()->name('google')->content('notranslate')->render(),
            Meta::tag()->name('googlebot')->content('notranslate')->render(),
            Meta::tag()->name('theme-color')->content('#CC0000')->render(),
            Meta::tag()->name('viewport')->content('width=device-width')->render(),
            Meta::tag()->name('viewport')->content('width=device-width, initial-scale=1, user-scalable=1, minimum-scale=1, maximum-scale=5')->render(),
        ]);
    }

    protected function metaTitle() {}
    protected function metaKeywords() {}
    protected function metaDescription()
    {
        global $post;
    }
}
