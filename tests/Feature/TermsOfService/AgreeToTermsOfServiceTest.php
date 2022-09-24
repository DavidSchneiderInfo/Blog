<?php

namespace Tests\Feature\TermsOfService;

use Tests\TestCase;

class AgreeToTermsOfServiceTest extends TestCase
{
    public function testTermsOfServiceCanBeAgreedTo(): void
    {
        $this->from(route('tos.show'))
            ->post(route('tos.agree'), ['return_url' => route('blog.index')])
            ->assertCookie('terms_of_service_agreement')
            ->assertRedirect(route('blog.index'));
    }
}
