<?php

declare(strict_types=1);

namespace Tests\Feature\Blog;

use App\Models\Post;
use Tests\TestCase;

class ShowSinglePostControllerTest extends TestCase
{
    public function testBlogShowsPosts(): void
    {
        $post = Post::factory()->create();

        $response = $this->withTosAgreed()
            ->get(route('blog.show', $post))
            ->assertStatus(200)
            ->assertSee($post->title)
            ->assertSee($post->content);
    }
}
