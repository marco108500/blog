<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{

    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function it_should_get_index()
    {
        $request = $this->call('get', '/posts');
        $this->assertEquals(200, $request->getStatusCode());
    }

    /** @test */
    public function it_should_show_post()
    {

        $post = create(\App\Post::class);

        $request = $this->call('get', '/posts/'.$post->id);

        $this->assertEquals(200, $request->getStatusCode());

    }
}
