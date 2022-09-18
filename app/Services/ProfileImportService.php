<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Post;
use App\Models\User;
use JsonException;

class ProfileImportService
{
    /**
     * Export a user including all data
     *
     * @throws JsonException
     */
    public function runImport(User $user, array $data): void
    {
        $user->unguard();
        if (array_key_exists('profile', $data)) {
            if (array_key_exists('name', $data['profile'])) {
                $user->name = $data['profile']['name'];
            }
            if (array_key_exists('email', $data['profile'])) {
                $user->email = $data['profile']['email'];
                $user->email_verified_at = null;
            }
            if (array_key_exists('created_at', $data['profile'])) {
                $user->created_at = $data['profile']['created_at'];
            }
            if (array_key_exists('updated_at', $data['profile'])) {
                $user->updated_at = $data['profile']['updated_at'];
            }

            if ($user->isDirty()) {
                $user->save();
            }
        }
        $user->reguard();

        if (array_key_exists('posts', $data)) {
            foreach ($data['posts'] as $postData) {
                Post::unguard();
                $post = new Post($postData);
                $post = $user->posts()->save($post);
                Post::reguard();
            }
        }
    }
}
