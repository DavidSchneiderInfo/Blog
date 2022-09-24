<?php

namespace Tests\Feature;

use App\Models\Post;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $posts = Post::factory(5)->create();

        $response = $this->withTosAgreed()
            ->get('/')
            ->assertStatus(200)
            ->assertSee(__('Welcome'));
    }
}
