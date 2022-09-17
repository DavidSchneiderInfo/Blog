<?php

declare(strict_types=1);

namespace Tests\Feature\Blog;

use App\Models\Post;
use Tests\TestCase;

class ShowPostsControllerTest extends TestCase
{
    public function testBlogShowsPosts(): void
    {
        $posts = Post::factory(5)->create();

        $response = $this->get(route('blog.index'))
            ->assertStatus(200)
            ->assertSee($posts->first()->title);
    }
}
