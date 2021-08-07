<?php

namespace Tests\Unit\Repositories;

use App\Models\Url;
use App\Repositories\UrlRepository;
use Mockery\MockInterface;
use Tests\Suites\RepositoryTestSuite;

/**
 * Class UrlRepositoryTest
 * @package Tests\Unit\Repositories
 * @coversDefaultClass \App\Repositories\UrlRepository
 */
class UrlRepositoryTest extends RepositoryTestSuite
{
    /** @var MockInterface | Url */
    private $urlModel;
    /** @var UrlRepository */
    private UrlRepository $repository;

    public function setRepository()
    {
        $this->urlModel = $this->mock(Url::class);
        $this->repository = new UrlRepository($this->urlModel);
    }

    public function setMockRepository(array $methods = []): void
    {
        $this->repository = $this->getMockBuilder(UrlRepository::class)
            ->setConstructorArgs([$this->urlModel])
            ->onlyMethods($methods)
            ->getMock();
    }

    /**
     * @covers ::__construct
     * @covers ::getUrl
     */
    public function testGetUrl()
    {
        $short = $this->faker->word;
        $url = $this->faker->url;
        $model = new Url(['url' => $url]);

        $this->urlModel->shouldReceive('where')->with('short', $short)->andReturnSelf();
        $this->urlModel->shouldReceive('first')->andReturn($model);

        $this->assertEquals($url, $this->repository->getUrl($short));
    }

    /**
     * @covers ::getUrl
     */
    public function testGetUrlWhenNoData()
    {
        $short = $this->faker->word;

        $this->urlModel->shouldReceive('where')->with('short', $short)->andReturnSelf();
        $this->urlModel->shouldReceive('first')->andReturnNull();

        $this->assertNull($this->repository->getUrl($short));
    }

    /**
     * @covers ::setUrl
     */
    public function testSetUrl()
    {
        $this->setMockRepository(['generateShortUrl']);

        $link = $this->faker->word;
        $short = $this->faker->word;

        $urlModel = Url::factory()->make(['url' => $link, 'short' => $short]);

        $this->repository->expects($this->once())->method('generateShortUrl')->willReturn($short);
        $this->urlModel->shouldReceive('create')->with([
            'url' => $link,
            'short' => $short,
        ])->andReturn($urlModel);

        $this->assertEquals(
            ['short' => $urlModel->short, 'url' => $urlModel->url],
            $this->repository->setUrl($link)
        );
    }
}
