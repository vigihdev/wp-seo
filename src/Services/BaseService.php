<?php

declare(strict_types=1);

namespace WpSeo\Services;

use Symfony\Component\Filesystem\Path;
use WpSeo\Factory\JsonTransformerFactory;

abstract class BaseService
{

    abstract public function render(): string;

    protected function dtoTransformer(string $dtoClass, string $fileNameJson): object|array
    {
        $filePathJson = Path::join($this->getBasePath(), $_ENV['WP_SEO_STORAGE'] ?? '', $fileNameJson);

        if (!file_exists($filePathJson)) {
            throw new \InvalidArgumentException("File not found: {$filePathJson}");
        }

        return JsonTransformerFactory::create($dtoClass)->transformWithFile($filePathJson);
    }

    private function getBasePath(): string
    {
        if (isset($_ENV['APP_ENV']) && $_ENV['APP_ENV'] === 'local') {
            return getcwd();
        }
        return get_template_directory();
    }
}
