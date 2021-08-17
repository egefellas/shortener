<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
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

    /**
     * @param UrlRequest $request
     * @return array
     */
    public function setUrl(UrlRequest $request): array
    {
        return $this->urlService->setUrl($request->link);
    }
}
