<?php

declare(strict_types=1);

namespace Tests\Feature\Backend\Posts;

use App\Models\Post;
use Tests\TestCase;

class StorePostTest extends TestCase
{
    public function testUserCanStorePost(): void
    {
        $user = $this->createUser();
        $post = Post::factory()->make()->toArray();

        $response = $this->actingAs($user)
            ->post(route('backend.posts.store', $post))
            ->assertStatus(302)
            ->assertRedirect(route('backend.posts.edit', $user->posts()->first()));

        $this->assertDatabaseHas('posts', [
            'user_id' => $user->id,
            'title' => $post['title'],
            'content' => $post['content'],
        ]);
    }
}
