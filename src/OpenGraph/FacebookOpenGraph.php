<?php

declare(strict_types=1);

namespace WpSeo\OpenGraph;

use Opengraph;
use Opengraph\{Reader, Writer, Meta};
use WpSeo\AbstractWpSeo;

final class FacebookOpenGraph extends AbstractWpSeo
{

    public function render(): string
    {
        return $this->generate();
    }

    private function generate(): string
    {


        // fb:app_id
        // og:locale og:image:type og:image:width og:image:height
        $writer = new Writer();
        $writer->append(Writer::OG_URL, 'http://www.nytimes.com/2015/02/19/arts/international/when-great-minds-dont-think-alike.html');
        $writer->append(Writer::OG_TYPE, "article");
        $writer->append(Writer::OG_TITLE, 'When Great Minds Don’t Think Alike');
        $writer->append(Writer::OG_DESCRIPTION, 'How much does culture influence creative thinking?');
        $writer->append(Writer::OG_IMAGE, 'http://static01.nyt.com/images/2015/02/19/arts/international/19iht-btnumbers19A/19iht-btnumbers19A-facebookJumbo-v2.jpg');
        return $writer->render();
    }
}
