<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers\Backend\Posts;

use App\Models\Post;
use Tests\TestCase;

class ShowPostTest extends TestCase
{
    public function testUserCanPreviewPost(): void
    {
        $post = Post::factory()->create();

        $this->actingAs($post->user)
            ->get(route('backend.posts.preview', $post))
            ->assertStatus(200)
            ->assertSee($post->title);
    }
}
