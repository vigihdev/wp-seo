<?php

declare(strict_types=1);

namespace WpSeo\Transformers;

use WpSeo\DTOs\Meta\MetaLinkDto;

final class JsonToMetaLinkDtoTransformer extends AbstractJsonTransformer
{

    /**
     * Transform single JSON string to MetaLinkDto
     * 
     * @return MetaLinkDto|null
     */
    public function transformJson(string $json): ?MetaLinkDto
    {

        if (!$this->validateJson($json)) {
            return null;
        }

        try {
            return $this->serializer->deserialize($json, MetaLinkDto::class, 'json');
        } catch (\Throwable $e) {
            error_log("Failed to deserialize: " . $e->getMessage());
            return null;
        }
    }


    /**
     * Transform single JSON string containing array to array of MetaLinkDto
     * 
     * @return MetaLinkDto[]
     */
    public function transformArrayJson(string $json): array
    {

        if (!$this->validateArrayJson($json)) {
            return [];
        }

        try {
            return $this->serializer->deserialize($json, MetaLinkDto::class . '[]', 'json');
        } catch (\Throwable $e) {
            error_log("Failed to deserialize: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Transform JSON file content to array of MetaLinkDto
     * 
     * @return MetaLinkDto[]|MetaLinkDto|null
     */
    public function transformFileJson(string $filePath): array|null|MetaLinkDto
    {
        return $this->transformFromFile($filePath);
    }
}
