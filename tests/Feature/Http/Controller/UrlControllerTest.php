<?php

namespace Tests\Feature\Http\Controller;

use App\Models\Url;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\TestCase;

/**
 * Class UrlControllerTest
 * @package Tests\Feature\Http\Controller
 * @coversDefaultClass \App\Http\Controllers\UrlController
 */
class UrlControllerTest extends TestCase
{
    use WithFaker;

    /**
     * @covers ::__construct
     * @covers ::getUrl
     */
    public function testGetUrl()
    {
        $url = $this->faker->url;
        $model = Url::factory()->create(['url' => $url]);

        $response = $this->get($model->short);

        $response->assertStatus(200)->assertSee('redirect');
    }

    /**
     * @covers ::__construct
     * @covers ::setUrl
     */
    public function testSetUrl()
    {
        $url = $this->faker->url;

        $response = $this->post('api/url/create', ['link' => $url]);

        $response->assertStatus(200)->assertJsonCount(2);
    }
}
