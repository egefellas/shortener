<?php

namespace App\Repositories;

use App\Models\Url;

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
}
