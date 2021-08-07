<?php

namespace Tests\Unit\Services;

use App\Repositories\UrlRepositoryInterface;
use App\Services\UrlService;
use Mockery\MockInterface;
use Tests\Suites\ServiceTestSuite;

/**
 * Class UrlServiceTest
 * @package Tests\Unit\Services
 * @coversDefaultClass \App\Services\UrlService
 */
class UrlServiceTest extends ServiceTestSuite
{
    /** @var MockInterface | UrlRepositoryInterface */
    private $urlRepository;
    /** @var UrlService */
    private UrlService $service;

    public function setService(): void
    {
        $this->urlRepository = $this->mock(UrlRepositoryInterface::class);
        $this->service = new UrlService($this->urlRepository);
    }

    /**
     * @covers ::__construct
     * @covers ::getUrl
     */
    public function testGetUrl()
    {
        $short = $this->faker->word;
        $url = $this->faker->url;

        $this->urlRepository->shouldReceive('getUrl')->with($short)->andReturn($url);

        $this->assertEquals($url, $this->service->getUrl($short));
    }

    /**
     * @covers ::__construct
     * @covers ::setUrl
     */
    public function testSetUrl()
    {
        $link = $this->faker->word;
        $expected = $this->faker->words;

        $this->urlRepository->shouldReceive('setUrl')->with($link)->andReturn($expected);

        $this->assertEquals($expected, $this->service->setUrl($link));
    }
}
