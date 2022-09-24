<?php

declare(strict_types=1);

namespace Tests\Feature\Backend\Posts;

use App\Models\Post;
use Tests\TestCase;

class ShowPostListTest extends TestCase
{
    public function testUserCanSeeCreatePostForm(): void
    {
        $post = Post::factory()->create();

        $this->actingAs($post->user)
            ->get(route('backend.posts.index'))
            ->assertStatus(200)
            ->assertSee($post->title);
    }
}
