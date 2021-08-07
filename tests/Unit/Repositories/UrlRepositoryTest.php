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
     * @covers ::__construct
     * @covers ::getUrl
     */
    public function testGetUrlWhenNoData()
    {
        $short = $this->faker->word;

        $this->urlModel->shouldReceive('where')->with('short', $short)->andReturnSelf();
        $this->urlModel->shouldReceive('first')->andReturnNull();

        $this->assertNull($this->repository->getUrl($short));
    }
}
