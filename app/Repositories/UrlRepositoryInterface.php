<?php

namespace App\Repositories;

use App\Http\Requests\UrlRequest;

interface UrlRepositoryInterface
{
    /**
     * @param string $short
     * @return string|null
     */
    public function getUrl(string $short): ?string;

    /**
     * @param string $link
     * @return array
     */
    public function setUrl(string $link): array;
}
