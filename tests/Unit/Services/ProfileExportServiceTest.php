<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use App\Models\Post;
use App\Services\ProfileExportService;
use Tests\TestCase;

class ProfileExportServiceTest extends TestCase
{
    public function testProfileExportService(): void
    {

        $user = $this->createUser();
        Post::factory(3)->create(['user_id'=> $user->id]);

        $service = new ProfileExportService();

        $json = $service->prepareExport($user);

        $data = json_decode($json, true);
        
        dd($data);
    }
}
