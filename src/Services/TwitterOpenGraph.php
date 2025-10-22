<?php

declare(strict_types=1);

namespace WpSeo\Services;

use WpSeo\Contracts\Wp\WpPostInfoContract;
use WpSeo\DTOs\OpenGraph\{OpenGraphDto, TwitterCardDto};
use WpSeo\Renderers\OpenGraph\TwitterOpenGraphRenderer;

final class TwitterOpenGraph extends BaseJsonService
{

    public function __construct(
        private readonly WpPostInfoContract $post
    ) {
        parent::__construct(
            fileNameJson: 'open-graph/twitter-card.json'
        );
    }

    public function render(): string
    {
        $openGraph = new OpenGraphDto(
            title: $this->post->getTitle(),
            url: $this->post->getUrl(),
            description: $this->post->getDescription(),
            imageUrl: $this->post->getFeaturedImage(),
            type: 'website',
        );

        $twitter = new TwitterOpenGraphRenderer(
            twitterCard: $this->getDtoFromJson(TwitterCardDto::class),
            openGraph: $openGraph
        );

        return $twitter->render();
    }
}
