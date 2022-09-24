<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use App\Models\Post;
use App\Models\User;
use App\Services\ProfileExportService;
use App\Services\ProfileImportService;
use Tests\TestCase;

class ProfileImportServiceTest extends TestCase
{
    public function testProfileImportService(): void
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

        $newUser = User::factory()->create([
            'name' => 'new-name',
            'email' => 'test2@localhost',
        ]);

        $service = new ProfileImportService();
        $service->runImport(
            $newUser,
            json_decode($json, true)
        );

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
}
