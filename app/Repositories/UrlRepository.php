<?php

namespace App\Repositories;

use App\Models\Url;

class UrlRepository implements UrlRepositoryInterface
{
    /**
     * @var Url
     */
    private $model;

    public function __construct(Url $model)
    {
        $this->model = $model;
    }

    public function getUrl($short): ?string
    {
        $model = $this->model->where('url', $short)->first();
        if ($model) {
            return $model->url;
        }

        return null;
    }
}
