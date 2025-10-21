<?php

declare(strict_types=1);

namespace WpSeo\Factory;

use WpSeo\Transformers\GenericJsonTransformer;

final class JsonTransformerFactory
{

    public static function create(string $dtoClass): GenericJsonTransformer
    {
        return new GenericJsonTransformer($dtoClass);
    }
}
