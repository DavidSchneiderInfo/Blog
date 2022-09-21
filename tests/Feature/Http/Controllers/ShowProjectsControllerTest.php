<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Middleware\ConfirmTermsOfService;
use Tests\TestCase;

class ShowProjectsControllerTest extends TestCase
{
    /**
     * Show Projects.
     *
     * @return void
     */
    public function test_example(): void
    {
        $this->withoutMiddleware(ConfirmTermsOfService::class);
        
        $response = $this->get(route('projects.show'));

        $response->assertStatus(200)
            ->assertSee(__('Projects'));
    }
}
