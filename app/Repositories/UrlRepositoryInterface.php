<?php

namespace App\Repositories;

use App\Http\Requests\UrlRequest;

interface UrlRepositoryInterface
{
    /**
     * @param $short
     * @return string|null
     */
    public function getUrl($short): ?string;

    /**
     * @param $request
     * @return string|null
     */
    public function setUrl($request);
}
