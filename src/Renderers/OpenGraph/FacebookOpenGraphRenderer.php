<?php

declare(strict_types=1);

namespace WpSeo\Renderers\OpenGraph;

use Opengraph\Writer;
use WpSeo\DTOs\OpenGraph\{FacebookOpenGraphDto, OpenGraphDto};

final class FacebookOpenGraphRenderer extends BaseOpenGraphRenderer
{

    public function __construct(
        private readonly FacebookOpenGraphDto $facebookDto,
        private readonly OpenGraphDto $openGraph
    ) {}

    public function render(): string
    {
        $writer = new Writer();
        $writer->clear();
        $writer->append(Writer::OG_URL, $this->openGraph->getUrl());
        $writer->append(Writer::OG_TYPE, $this->openGraph->getType());
        $writer->append(Writer::OG_TITLE, $this->openGraph->getTitle());
        $writer->append(Writer::OG_DESCRIPTION, $this->openGraph->getDescription());
        $writer->append(Writer::OG_IMAGE, $this->openGraph->getImageUrl());
        return $writer->render('');
    }
}
