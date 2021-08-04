<?php

namespace App\Http\Services;

use App\Repositories\UrlRepositoryInterface;

class UrlService
{
    /**
     * @var UrlRepositoryInterface
     */
    private $urlRepository;

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
     * @return string
     */
    public function getUrl(string $short): ?string
    {
        return $this->urlRepository->getUrl($short);
    }
}
