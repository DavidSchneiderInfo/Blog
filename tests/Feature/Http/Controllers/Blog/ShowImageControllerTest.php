<?php

namespace Tests\Feature\Http\Controllers\Blog;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ShowImageControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUploadedImagesCanBeShown()
    {
        $user = User::factory()->create();

        Storage::fake();

        $response = $this->actingAs($user)->post(route('backend.posts.image_upload'), [
            'upload' => UploadedFile::fake()->image('photo2.jpg'),
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                                      'default',
                                  ]);

        $this->withTosAgreed()
            ->get($response->json('default'))
            ->assertStatus(200);

        Storage::disk()->assertExists(
            str_replace(url('/'), '', $response->json('default'))
        );
    }
}
