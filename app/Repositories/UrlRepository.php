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
     * @param string $link
     * @return array
     */
    public function setUrl(string $link): array
    {
        $urlModel = $this->model->create([
            'url' => $link,
            'short' => $this->generateShortUrl(),
        ]);

        return ['short' => $urlModel->short, 'url' => $urlModel->url];
    }


    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function generateShortUrl(): string
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 7);
    }
}
