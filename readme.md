```php

use WpSeo\DTOs\{MetaTagDto, MetaLinkDto};
use WpSeo\DTOs\Meta\SeoMetaDto;
use WpSeo\DTOs\OpenGraph\{FacebookOpenGraphDto, OpenGraphDto, TwitterCardDto};
use WpSeo\DTOs\SchemaOrg\{AggregateRatingDto, AuthorDto, BreadcrumbListDto, ImageDto};
use WpSeo\DTOs\SchemaOrg\LocalBusiness\{GeoCoordinatesDto, LocalBusinessProfileDto, OpeningHoursDto, PostalAddressDto, OpeningHoursSpecificationDto};
use WpSeo\DTOs\SchemaOrg\{NewsArticleDto, OrganizationDto, ReviewDto, WebSiteDto};
use WpSeo\Factory\JsonTransformerFactory;
use WpSeo\Renderers\{MetaTagRenderer, MetaLinkRenderer};
use WpSeo\Renderers\Meta\SeoMetaRenderer;
use WpSeo\Renderers\OpenGraph\{FacebookOpenGraphRenderer, TwitterOpenGraphRenderer};
use WpSeo\Renderers\SchemaOrg\{LocalBusinessRenderer, OrganizationRenderer, NewsArticleRenderer, BreadcrumbListRenderer, WebSiteRenderer};

$basepath = __DIR__ . '/storage/data/json/schema-org';

$organization = new OrganizationRenderer(
    organization: JsonTransformerFactory::create(OrganizationDto::class)
        ->transformWithFile("{$basepath}/organization.json")
);

$newsArticle = new NewsArticleRenderer(
    newsArticle: JsonTransformerFactory::create(NewsArticleDto::class)
        ->transformWithFile("{$basepath}/news-article.json")
);

$breadcrumb = new BreadcrumbListRenderer();
$breadcrumb->addItems(
    items: JsonTransformerFactory::create(BreadcrumbListDto::class)
        ->transformWithFile("{$basepath}/breadcrumb-list.json")
);

$localBusiness = new LocalBusinessRenderer(
    businessProfile: JsonTransformerFactory::create(LocalBusinessProfileDto::class)
        ->transformWithFile("{$basepath}/local-business/business-profile.json"),
    address: JsonTransformerFactory::create(PostalAddressDto::class)
        ->transformWithFile("{$basepath}/local-business/postal-address.json"),
    geo: JsonTransformerFactory::create(GeoCoordinatesDto::class)
        ->transformWithFile("{$basepath}/local-business/geo-coordinates.json"),
    openingHours: JsonTransformerFactory::create(OpeningHoursSpecificationDto::class)
        ->transformWithFile("{$basepath}/local-business/24-7.json"),
    aggregateRating: JsonTransformerFactory::create(AggregateRatingDto::class)
        ->transformWithFile("{$basepath}/local-business/aggregate-rating.json"),
    review: JsonTransformerFactory::create(ReviewDto::class)
        ->transformWithFile("{$basepath}/local-business/review.json")
);

$webSite = new WebSiteRenderer(
    webSite: JsonTransformerFactory::create(WebSiteDto::class)
        ->transformWithFile("{$basepath}/web-site.json")
);

$metaTag = new MetaTagRenderer();
$metaTag->addItems(
    items: JsonTransformerFactory::create(MetaTagDto::class)
        ->transformWithFile("{$basepath}/../meta-tag.json")
);

$metaLink = new MetaLinkRenderer();
$metaLink->addItems(
    items: JsonTransformerFactory::create(MetaLinkDto::class)
        ->transformWithFile("{$basepath}/../meta-link.json")
);

$openGraph = JsonTransformerFactory::create(OpenGraphDto::class)
    ->transformWithFile("{$basepath}/../open-graph.json");
$facebookDto = JsonTransformerFactory::create(FacebookOpenGraphDto::class)
    ->transformWithFile("{$basepath}/../open-graph/facebook-graph.json");
$twitterCard = JsonTransformerFactory::create(TwitterCardDto::class)
    ->transformWithFile("{$basepath}/../open-graph/twitter-card.json");

$facebookGraph = new FacebookOpenGraphRenderer(
    facebookDto: $facebookDto,
    openGraph: $openGraph
);

$twitterGraph = new TwitterOpenGraphRenderer(
    twitterCard: $twitterCard,
    openGraph: $openGraph
);

$seoMeta = new SeoMetaRenderer(
    seoMeta: JsonTransformerFactory::create(SeoMetaDto::class)
        ->transformWithFile("{$basepath}/../seo-meta.json")
);

file_put_contents(
    __DIR__ . '/tests/fixtures/schema-org.html',
    implode(PHP_EOL, [
        $seoMeta->render(),
        $metaTag->render(),
        $metaLink->render(),
        $facebookGraph->render(),
        $twitterGraph->render(),

        $localBusiness->render(),
        $organization->render(),
        $newsArticle->render(),
        $breadcrumb->render(),
        $webSite->render(),
    ])
);


```
