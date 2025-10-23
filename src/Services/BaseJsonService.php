<?php

declare(strict_types=1);

namespace WpSeo\Services;

use Symfony\Component\Filesystem\Path;
use WpSeo\Factory\JsonTransformerFactory;

abstract class BaseJsonService
{

    abstract public function render(): string;

    private ?string $filePathJson = null;

    public function __construct(
        private readonly string $fileNameJson
    ) {

        if (!isset($_ENV['WP_SEO_STORAGE'])) {
            throw new \RuntimeException("Env NOT found:  WP_SEO_STORAGE");
        }

        $filePathJson = Path::join($this->getBasePath(), $_ENV['WP_SEO_STORAGE'], $fileNameJson);
        if (!file_exists($filePathJson)) {
            throw new \RuntimeException("File not found: {$filePathJson}");
        }

        $this->filePathJson = $filePathJson;
    }

    protected function getDtoFromJson(string $dtoClass): object|array
    {
        return JsonTransformerFactory::create($dtoClass)->transformWithFile($this->filePathJson);
    }

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
