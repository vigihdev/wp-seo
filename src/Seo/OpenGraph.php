<?php

declare(strict_types=1);


namespace WpSeo;

use vigihdev\WpModels\WP\Posts;
use vigihdev\WpOpengraph\Writer;
use WpSeo\BaseWpSeo;

use function Util\getImages;

/**
 * Kelas OpenGraph bertanggung jawab untuk menghasilkan tag Open Graph
 * yang digunakan untuk meningkatkan tampilan pos di media sosial.
 *
 * Kelas ini mengumpulkan informasi seperti URL, tipe, judul, deskripsi,
 * dan gambar dari pos saat ini, dan menghasilkan tag meta yang sesuai.
 */
final class OpenGraph extends BaseWpSeo
{


    /**
     *
     * @return string|null
     */
    public static function render(): ?string
    {
        return (new self())->run();
    }

    /**
     *
     * @return string|null
     */
    protected function run(): ?string
    {

        list($url, $type, $title, $description, $image) = $this->getDataPost();

        $writer = new Writer();
        $writer->append(Writer::OG_TITLE, $title);
        $writer->append(Writer::OG_TYPE, Writer::TYPE_ARTICLE);
        $writer->append(Writer::OG_URL, $url);
        $writer->append(Writer::OG_IMAGE, $image);
        $writer->append(Writer::OG_IMAGE_WIDTH, '850');
        $writer->append(Writer::OG_IMAGE_HEIGHT, '450');
        $writer->append(Writer::OG_IMAGE_TYPE, 'image/png');
        $writer->append(Writer::OG_DESCRIPTION, $description);

        return implode(PHP_EOL, [
            $writer->render(''),
            $this->twitterCard()
        ]);
    }


    /**
     * Menghasilkan tag meta untuk Twitter Card.
     *
     * Fungsi ini mengumpulkan data pos dan menghasilkan tag meta yang diperlukan
     * untuk Twitter Card, termasuk informasi seperti judul, deskripsi, dan gambar.
     *
     * @return string Tag meta untuk Twitter Card.
     */
    protected function twitterCard(): string
    {

        list($url, $type, $title, $description, $image) = $this->getDataPost();
        return implode(PHP_EOL, [
            '<meta name="twitter:card" content="summary_large_image" />',
            '<meta name="twitter:site" content="@okkarentid" />',
            '<meta name="twitter:creator" content="@okkarentid" />',
            '<meta name="twitter:title" content="' . $title . '" />',
            '<meta name="twitter:description" content="' . $description . '" />',
            '<meta name="twitter:image" content="' . $image . '" />',
        ]);
    }

    /**
     * Mengambil data pos dari Open Graph.
     *
     * Fungsi ini bertanggung jawab untuk mengambil dan mengembalikan data pos
     * yang diperlukan untuk Open Graph, termasuk informasi seperti judul,
     * deskripsi, dan gambar yang terkait dengan pos.
     *
     * @return array Mengembalikan array yang berisi data pos.
     */
    protected function getDataPost(): array
    {
        global $post;

        if ($post instanceof \WP_Post && !is_search() && !is_archive() && !is_tag()) {
            $model = Posts::query()->where('ID', (int)$post->ID)->get();
            if ($model instanceof Posts) {

                $image = getImages('schema-org', 'hero-1.png');
                if (!is_home() && !is_front_page()) {
                    if (is_string($model->getFeaturedImage()) && !empty($model->getFeaturedImage())) {
                        $image = $model->getFeaturedImage();
                    }
                }

                $post_title = preg_replace('/\s{2,}/', ' ', $model->post_title); // Menghapus spasi berlebih 
                return [
                    get_permalink($post),
                    'article',
                    $post_title,
                    $model->getWordContent(200),
                    (substr($image, 0, 4) === 'http' ? $image : get_site_url() . '/' . ltrim($image, '/')),
                ];
            }
        }

        return ['', '', '', '', '', ''];
    }
}
