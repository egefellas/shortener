<?php

namespace App\Services;

use App\Repositories\UrlRepositoryInterface;

class UrlService
{
    /** @var UrlRepositoryInterface */
    private UrlRepositoryInterface $urlRepository;

    /**
     * UrlService constructor.
     * @param UrlRepositoryInterface $urlRepository
     */
    public function __construct(UrlRepositoryInterface $urlRepository)
    {
        $this->urlRepository = $urlRepository;
    }

    /**
     * @param string $short
     * @return string|null
     */
    public function getUrl(string $short): ?string
    {
        return $this->urlRepository->getUrl($short);
    }
}
