<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use JsonException;

class ProfileExportService
{
    /**
     * @throws JsonException
     */
    public function prepareExport(User $user): string
    {
        $data = [];

        $data['profile'] = $user->toArray();

        return json_encode($data, JSON_THROW_ON_ERROR);
    }
}
