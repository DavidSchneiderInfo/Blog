<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers\Backend\Posts;

use App\Models\Post;
use Tests\TestCase;

class DeletePostTest extends TestCase
{
    public function testUserCanSeeEditPostForm(): void
    {
        $post = Post::factory()->create();

        $this->actingAs($post->user)
            ->delete(route('backend.posts.delete', $post))
            ->assertStatus(302)
            ->assertRedirect(route('backend.posts.index'));
    }
}
