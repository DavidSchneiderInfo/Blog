<?php

declare(strict_types=1);

namespace Tests\Feature\Backend\Posts;

use App\Models\Post;
use Tests\TestCase;

class EditPostTest extends TestCase
{
    public function testUserCanSeeEditPostForm(): void
    {
        $post = Post::factory()->create();

        $this->actingAs($post->user)
            ->get(route('backend.posts.edit', $post))
            ->assertStatus(200)
            ->assertSee(__('Edit Post'))
            ->assertSee($post->title);
    }
}
