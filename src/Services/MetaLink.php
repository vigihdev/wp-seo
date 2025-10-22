<?php

declare(strict_types=1);

namespace WpSeo\Services;

use WpSeo\DTOs\Meta\MetaLinkDto;
use WpSeo\Renderers\Meta\MetaLinkRenderer;

final class MetaLink extends BaseJsonService
{

    public function __construct()
    {
        parent::__construct(
            fileNameJson: 'meta-link.json'
        );
    }

    public function render(): string
    {
        $data = $this->getDtoFromJson(MetaLinkDto::class);
        $meta = new MetaLinkRenderer();
        $meta->addItems($data);
        return $meta->render();
    }
}
