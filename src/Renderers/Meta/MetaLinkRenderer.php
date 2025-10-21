<?php

declare(strict_types=1);

namespace WpSeo\Renderers\Meta;

use WpSeo\Renderers\BaseRenderer;
use WpSeo\DTOs\Meta\MetaLinkDto;
use Yiisoft\Html\Tag\Link;

final class MetaLinkRenderer extends BaseRenderer
{


    /**
     * @var MetaLinkDto[] $items
     */
    private array $items = [];

    public function addItem(mixed $item): self
    {

        if (!$item instanceof MetaLinkDto) {
            throw new \InvalidArgumentException('item expects MetaLinkDto');
        }

        $this->items[] = $item;
        return $this;
    }

    /**
     * @param MetaLinkDto[] $items
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
            $link = Link::tag()
                ->rel($item->getRel())
                ->href($this->escapeUrl($item->getHref()));

            if (!empty($item->getType())) {
                $link = $link->type($item->getType());
            }

            $itemsHtml[] = $link->render();
        }

        return $this->renderMultiple($itemsHtml);
    }
}
