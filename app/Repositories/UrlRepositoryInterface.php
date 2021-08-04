<?php

namespace App\Repositories;

interface UrlRepositoryInterface
{
    /**
     * @param $short
     * @return string
     */
    public function getUrl($short): ?string;
}
