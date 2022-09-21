<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers\Backend\Posts;

use Tests\TestCase;

class CreatePostTest extends TestCase
{
    public function testUserCanSeeCreatePostForm(): void
    {
        $user = $this->createUser();

        $this->actingAs($user)
            ->get(route('backend.posts.create'))
            ->assertStatus(200)
            ->assertSee(__('Create Post'));
    }
}
