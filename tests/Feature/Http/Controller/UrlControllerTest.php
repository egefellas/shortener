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
    public function testUrlCreate()
    {
        $url = $this->faker->url;
        $model = Url::factory()->create(['url' => $url]);

        $response = $this->get($model->short);

        $response->assertStatus(200)->assertSee($url);
    }
}
