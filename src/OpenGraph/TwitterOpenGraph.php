<?php

declare(strict_types=1);

namespace WpSeo\OpenGraph;

use Opengraph\{Reader, Writer, Meta};
use WpSeo\AbstractWpSeo;

final class TwitterOpenGraph extends AbstractWpSeo
{

    public function render(): string
    {
        return $this->generate();
    }

    private function generate(): string
    {

        $writer = new Writer();
        $writer->append('twitter:card', 'summary');
        $writer->append('twitter:site', '@nytimesbits');
        $writer->append('twitter:creator', '@nickbilton');
        return $writer->render();
    }
}
