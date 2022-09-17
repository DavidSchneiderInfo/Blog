<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;

class ProfileExportService
{
    /**
     * Export a user including all data
     *
     * @throws \JsonException
     */
    public function prepareExport(User $user): string
    {
        $data = [];

        $data['profile'] = $user->toArray();

        $data['posts'] = $user->posts()->get()->toArray();

        return json_encode($data, JSON_THROW_ON_ERROR);
    }
}
