<?php

declare(strict_types=1);

namespace WpSeo\Services;

use WpSeo\Contracts\Wp\WpPostInfoContract;
use WpSeo\DTOs\OpenGraph\{FacebookOpenGraphDto, OpenGraphDto};
use WpSeo\Renderers\OpenGraph\FacebookOpenGraphRenderer;

final class FacebookOpenGraph extends BaseJsonService
{

    public function __construct(
        private readonly WpPostInfoContract $post
    ) {
        parent::__construct(
            fileNameJson: 'open-graph/facebook-graph.json'
        );
    }

    public function render(): string
    {

        $openGraph = new OpenGraphDto(
            title: $this->post->getTitle(),
            url: $this->post->getUrl(),
            description: $this->post->getDescription(),
            imageUrl: $this->post->getFeaturedImage() ?? '',
            type: 'website',
        );

        $facebook = new FacebookOpenGraphRenderer(
            facebookDto: $this->getDtoFromJson(FacebookOpenGraphDto::class),
            openGraph: $openGraph
        );

        return $facebook->render();
    }
}
