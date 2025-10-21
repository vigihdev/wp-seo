<?php

declare(strict_types=1);

namespace WpSeo\Transformers;

final class GenericJsonTransformer extends AbstractJsonTransformer
{

    public function __construct(
        private readonly string $dtoClass
    ) {
        parent::__construct();
    }

    public function transformJson(string $json): ?object
    {

        if (!$this->validateJson($json)) {
            return null;
        }

        try {
            return $this->serializer->deserialize($json, $this->dtoClass, 'json');
        } catch (\Throwable $e) {
            error_log("Transform error: {$e->getMessage()}");
            return null;
        }
    }

    public function transformArrayJson(string $json): array
    {
        if (!$this->validateArrayJson($json)) {
            return [];
        }

        try {
            return $this->serializer->deserialize($json, $this->dtoClass . '[]', 'json');
        } catch (\Throwable $e) {
            error_log("Transform array error: {$e->getMessage()}");
            return [];
        }
    }

    public function transformWithFile(string $filepath): object|array
    {
        try {
            return $this->transformFromFile($filepath);
        } catch (\Throwable $e) {
            error_log("Transform file error: {$e->getMessage()}");
            return [];
        }
    }
}
