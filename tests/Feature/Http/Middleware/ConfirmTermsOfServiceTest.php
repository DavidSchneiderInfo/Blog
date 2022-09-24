<?php

namespace Tests\Feature\Http\Middleware;

use Tests\TestCase;

class ConfirmTermsOfServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRedirectWithoutCookie():void
    {
        $this->get('/')
            ->assertRedirect(route('legal.tos.show', ['return_url' => url('/')]));

        $this->get('blog')
            ->assertRedirect(route('legal.tos.show', ['return_url' => route('blog.index')]));
    }

    public function testNoRedirectWithCookie(): void
    {
        $this->withCookie('terms_of_service_agreement', true)
            ->get('/')
            ->assertStatus(200)
            ->assertSee(__('Welcome'));
    }
}
