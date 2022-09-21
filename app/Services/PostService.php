<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Post;
use App\Models\User;

class PostService
{
    public static function create(User $user, array $attributes): Post
    {
        $post = new Post($attributes);
        $user->posts()->save($post);
        return $post;
    }

    public static function update(Post $post, array $attributes): Post
    {
        $post->update($attributes);
        return $post;
    }
}
