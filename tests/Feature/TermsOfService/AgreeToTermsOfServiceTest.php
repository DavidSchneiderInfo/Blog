<?php

namespace Tests\Feature\TermsOfService;

use Tests\TestCase;

class AgreeToTermsOfServiceTest extends TestCase
{
    public function testTermsOfServiceCanBeAgreedTo(): void
    {
        $response = $this->post(route('tos.agree'), []);

        $response->assertCookie('terms_of_service_agreement');
    }
}
