<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers\Backend\Profile;

use App\Http\Livewire\Profile\ImportData;
use App\Models\Post;
use App\Models\User;
use App\Services\ProfileExportService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * @group data-management
 */
class DataManagementTest extends TestCase
{
    public function testUserCanSeeProfile(): void
    {
        $user = $this->createUser();
        $this->actingAs($user)
            ->get(route('backend.profile.index'))
            ->assertStatus(200)
            ->assertSee($user->name)
            ->assertSee($user->email);
    }

    public function testUserCanImportData2()
    {
        $oldUser = User::factory()->create([
            'name' => 'old-name',
            'email' => 'test@localhost',
            'created_at' => '2022-09-01 00:00:00',
            'updated_at' => '2022-09-01 00:00:00',
        ]);
        $posts = Post::factory(5)->create([
            'user_id' => $oldUser->id,
            'created_at' => '2022-09-01 00:00:00',
            'updated_at' => '2022-09-01 00:00:00',
        ]);

        $service = new ProfileExportService();
        $json = $service->prepareExport($oldUser);

        $oldUser->delete();

        $this->assertDatabaseMissing('users', [
            'id' => $oldUser->id,
            'name' => 'old-name',
            'email' => 'test@localhost',
            'created_at' => '2022-09-01 00:00:00',
            'updated_at' => '2022-09-01 00:00:00',
        ]);

        $this->assertDatabaseMissing('posts', [
            'user_id' => $oldUser->id,
            'created_at' => '2022-09-01 00:00:00',
            'updated_at' => '2022-09-01 00:00:00',
        ]);

        $file = UploadedFile::fake()->create('data.json');

        $newUser = User::factory()->create([
            'name' => 'new-name',
            'email' => 'test2@localhost',
        ]);
        Storage::disk()->put('imports/'.$newUser->id.'.json', $json);

        Auth::shouldReceive('user')->once()->andreturn($newUser);
        Livewire::test(ImportData::class)
            ->set('importData', $file)
            ->call('save');

        Storage::disk()->assertExists('imports/1.json');

        $this->assertNotEquals(
            $oldUser->id,
            $newUser->id
        );

        $this->assertDatabaseHas('users', [
            'id' => $newUser->id,
            'name' => 'old-name',
            'email' => 'test@localhost',
        ]);

        $this->assertDatabaseMissing('users', [
            'id' => $newUser->id,
            'name' => 'new-name',
            'email' => 'test2@localhost',
            'created_at' => '2022-09-01 00:00:00',
            'updated_at' => '2022-09-01 00:00:00',
        ]);

        $posts = $posts->toArray();
        foreach ($posts as $index => $post) {
            $post['user_id'] = $newUser->id;
            $this->assertDatabaseHas('posts', $post);
        }
    }

    public function testUserCanExportData(): void
    {
        $user = $this->createUser();
        Post::factory(3)->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
            ->post(route('backend.profile.export'));

        $response->assertDownload('export.json');
    }
}
