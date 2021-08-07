<?php

namespace App\Repositories;

use App\Http\Requests\UrlRequest;
use App\Models\Url;
use Illuminate\Support\Facades\Cookie;

class UrlRepository implements UrlRepositoryInterface
{
    const COOKIE_KEY = 'user.linKey';

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
     * @return array|null
     */
    public function setUrl($request)
    {
        if (!Cookie::get(self::COOKIE_KEY)) {
            Cookie::queue(self::COOKIE_KEY, uniqid('linKey'), 10080); // 1 week
        }
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
