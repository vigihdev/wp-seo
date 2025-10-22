<?php

declare(strict_types=1);

namespace WpSeo\Contracts\Wp;

interface WpAuthorContract
{
    /**
     * Get author nicename
     * 
     * @return string
     */
    public function getNicename(): string;

    /**
     * Get author email
     * 
     * @return string
     */
    public function getEmail(): string;

    /**
     * Get author URL/website
     * 
     * @return string
     */
    public function getUrl(): string;

    /**
     * Get author status
     * 
     * @return string
     */
    public function getStatus(): string;
}
