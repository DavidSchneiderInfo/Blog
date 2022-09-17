<?php

declare(strict_types=1);

namespace Tests\Feature\Backend\Profile;

use App\Models\Post;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DataManagementTest extends TestCase
{
    public function testUserCanImportData(): void
    {
        $this->markTestIncomplete();
        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('pos');

        $this->post('/avatar', [
            'avatar' => $file,
        ]);

        Storage::disk('avatars')->assertExists($file->hashName());
    }

    public function testUserCanExportData(): void
    {
        $user = $this->createUser();
        Post::factory(3)->create(['user_id'=> $user->id]);

        $response = $this->actingAs($user)
            ->post(route('backend.export'));

        $response->assertDownload('export.json');
    }
}
