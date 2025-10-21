<?php

declare(strict_types=1);

namespace WpSeo\Renderers\SchemaOrg;

use Spatie\SchemaOrg\Schema;
use WpSeo\Contracts\AddContract;
use WpSeo\DTOs\SchemaOrg\BreadcrumbListDto;

final class BreadcrumbListRenderer extends BaseSchemaOrgRenderer implements AddContract
{

    /**
     * @var BreadcrumbListDto[] $items
     */
    private array $items = [];

    public function __construct() {}

    public function addItem(mixed $item): self
    {

        if (!$item instanceof BreadcrumbListDto) {
            throw new \InvalidArgumentException('item expects BreadcrumbListDto');
        }

        $this->items[] = $item;
        return $this;
    }

    /**
     * @param BreadcrumbListDto[] $items
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

        if (empty($this->items)) {
            return '';
        }

        $breadcrumbs = [];
        foreach ($this->items as $item) {
            $breadcrumbs[] = Schema::listItem()
                ->position($item->getPosition())
                ->name($item->getName())
                ->item($item->getItem());
        }

        return Schema::breadcrumbList()
            ->setProperty('@id', $this->schemaIdGenerator('breadcrumbList'))
            ->itemListElement($breadcrumbs)
            ->toScript();
    }
}
