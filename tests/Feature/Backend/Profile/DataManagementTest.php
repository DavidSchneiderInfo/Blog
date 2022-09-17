<?php

declare(strict_types=1);

namespace Tests\Feature\Backend\Profile;

use App\Models\Post;
use App\Services\ProfileExportService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

/**
 * @group data-management
 */
class DataManagementTest extends TestCase
{
    public function testUserCanImportData(): void
    {
        $user = $this->createUser();
        $posts = Post::factory(3)->create(['user_id' => $user->id]);

        $json = (new ProfileExportService)->prepareExport($user);
        Storage::disk('testing')->put('data.json', $json);

        $uploadedFile = new UploadedFile(
            storage_path('testing/data.json'),
            'data.json',
            'application/json'
        );

        Post::whereIn('id', $posts->pluck('id'))->delete();

        $this->actingAs($user)
            ->post(route('backend.import'), [
                'importFile' => $uploadedFile,
            ])
            ->assertRedirect(route('home'));

        $this->assertDatabaseHas('posts', [
            ['title' => $posts->get(0)->title],
            ['title' => $posts->get(1)->title],
            ['title' => $posts->get(2)->title],
        ]);
    }

    public function testUserCanExportData(): void
    {
        $user = $this->createUser();
        Post::factory(3)->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
            ->post(route('backend.export'));

        $response->assertDownload('export.json');
    }
}
