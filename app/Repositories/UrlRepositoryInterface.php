<?php

namespace App\Repositories;

interface UrlRepositoryInterface
{
    /**
     * @param $short
     * @return string|null
     */
    public function getUrl($short): ?string;
}
