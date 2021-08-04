<?php

namespace App\Http\Controllers;

use App\Http\Services\UrlService;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    /**
     * @var UrlService
     */
    private $urlService;

    public function __construct(UrlService $urlService)
    {
        $this->urlService = $urlService;
    }

    public function getUrl(string $short)
    {
        $url = $this->urlService->getUrl($short);
        dd($url);
    }
}
