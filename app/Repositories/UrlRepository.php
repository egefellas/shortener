<?php

namespace App\Repositories;

use App\Http\Requests\UrlRequest;
use App\Models\Url;
use Illuminate\Support\Facades\Cookie;

class UrlRepository implements UrlRepositoryInterface
{
    /** @var Url */
    private Url $model;

    /**
     * UrlRepository constructor.
     * @param Url $model
     */
    public function __construct(Url $model)
    {
        $this->model = $model;
    }

    /**
     * @param $short
     * @return string|null
     */
    public function getUrl($short): ?string
    {
        $model = $this->model->where('short', $short)->first();

        if ($model) {
            return $model->url;
        }

        return null;
    }

    /**
     * @param UrlRequest $request
     * @return string|null
     */
    public function setUrl($request)
    {
        $url = new $this->model;
        $url->url = $request->link;
        $url->short = $this->generateSortUrl();
        $url->save();

        return response()->json(['short' => $url->short, 'url' => $url->url], 200);
    }

    private function generateSortUrl()
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 7);
    }
}
