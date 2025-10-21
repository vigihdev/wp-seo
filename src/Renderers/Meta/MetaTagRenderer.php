<?php

declare(strict_types=1);

namespace WpSeo\Renderers\Meta;

use WpSeo\Renderers\BaseRenderer;
use WpSeo\DTOs\Meta\MetaTagDto;
use Yiisoft\Html\Tag\Meta;

final class MetaTagRenderer extends BaseRenderer
{


    /**
     * @var MetaTagDto[] $items
     */
    private array $items = [];

    public function addItem(mixed $item): self
    {

        if (!$item instanceof MetaTagDto) {
            throw new \InvalidArgumentException('item expects MetaTagDto');
        }

        $this->items[] = $item;
        return $this;
    }

    /**
     * @param MetaTagDto[] $items
     */
    public function addItems(array $items): self
    {
        foreach ($items as $item) {
            $this->addItem($item);
        }
        return $this;
    }

    public function render(): string
    {

        $itemsHtml = [];
        foreach ($this->items as $item) {
            $itemsHtml[] = Meta::tag()
                ->name($item->getName())
                ->content($item->getContent())
                ->render();
        }

        return $this->renderMultiple($itemsHtml);
    }
}
