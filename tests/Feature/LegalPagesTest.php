<?php

namespace Tests\Feature;

use Tests\TestCase;

class LegalPagesTest extends TestCase
{
    public function testLegalPagesCanBeSeen(): void
    {
        $this->get(route('legal.copyright.show'))
            ->assertStatus(200)
            ->assertSee('Copyright');

        $this->get(route('legal.disclaimer.show'))
            ->assertStatus(200)
            ->assertSee('Disclaimer');

        $this->get(route('legal.notice.show'))
            ->assertStatus(200)
            ->assertSee('Legal Notice');

        $this->get(route('legal.tos.show'))
            ->assertStatus(200)
            ->assertSee('Terms of Service');
    }
    
    public function testTermsOfServiceCanBeAgreedTo(): void
    {
        $this->from(route('legal.tos.show'))
            ->post(route('legal.tos.agree'), ['return_url' => route('blog.index')])
            ->assertCookie('terms_of_service_agreement')
            ->assertRedirect(route('blog.index'));
    }
}
