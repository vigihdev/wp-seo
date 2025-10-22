<?php

declare(strict_types=1);

namespace WpSeo\Services;

use WpSeo\DTOs\Meta\MetaTagDto;
use WpSeo\Renderers\Meta\MetaTagRenderer;

final class MetaTag extends BaseJsonService
{

    public function __construct()
    {
        parent::__construct(
            fileNameJson: 'meta-tag.json'
        );
    }

    public function render(): string
    {
        $data = $this->getDtoFromJson(MetaTagDto::class);
        $meta = new MetaTagRenderer();
        $meta->addItems($data);
        return $meta->render();
    }
}
