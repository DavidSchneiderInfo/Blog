<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use App\Models\Post;
use App\Services\ProfileExportService;
use JsonException;
use Tests\TestCase;
use function PHPUnit\Framework\assertEquals;

class ProfileExportServiceTest extends TestCase
{
    /**
     * @group data-management
     * @throws JsonException
     */
    public function testProfileExportService(): void
    {
        $user = $this->createUser([
            'name' => 'Prof. Jamison Dickinson MD',
            'email' => 'tcrist@example.org',
            'email_verified_at' => '2022-09-17T13:21:33.000000Z',
            'updated_at' => '2022-09-17T13:21:34.000000Z',
            'created_at' => '2022-09-17T13:21:34.000000Z',
        ]);

        $posts = Post::factory(2)->create(['user_id' => $user->id]);

        $service = new ProfileExportService();

        $json = $service->prepareExport($user);

        $data = json_decode($json, true, 512, JSON_THROW_ON_ERROR);

        assertEquals($data, [
            'profile' => [
                'name' => 'Prof. Jamison Dickinson MD',
                'email' => 'tcrist@example.org',
                'updated_at' => '2022-09-17 13:21:34',
                'created_at' => '2022-09-17 13:21:34',
            ],
            'posts' => [
                [
                    'title' => $posts->first()->title,
                    'content' => $posts->first()->content,
                    'created_at' => (string) $posts->first()->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $posts->first()->updated_at->format('Y-m-d H:i:s'),
                    'keywords' => $posts->first()->keywords,
                    'description' => $posts->first()->description,
                ],
                [
                    'title' => $posts->last()->title,
                    'content' => $posts->last()->content,
                    'created_at' => $posts->last()->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $posts->last()->updated_at->format('Y-m-d H:i:s'),
                    'keywords' => $posts->last()->keywords,
                    'description' => $posts->last()->description,
                ],
            ],
        ]);
    }
}
