<?php

namespace App\Http\Controllers;

use App\Services\UrlService;

class UrlController extends Controller
{
    /**
     * @var UrlService
     */
    private UrlService $urlService;

    public function __construct(UrlService $urlService)
    {
        $this->urlService = $urlService;
    }

    /**
     * @param string $short
     * @return string|null
     */
    public function getUrl(string $short): ?string
    {
        return $this->urlService->getUrl($short);
    }
}
