<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Services\UrlService;
use Illuminate\View\View;

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
     * @return View
     */
    public function getUrl(string $short)
    {
        $array = compact('short');
        $array['url'] = $this->urlService->getUrl($short);

        return view('pages.redirect', ['variables' => $array]);
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
