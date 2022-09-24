<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseMigrations;

    public function createUser(array $attributes = []): User
    {
        return User::factory()->create($attributes);
    }

    public function withTosAgreed()
    {
        return $this->withCookie('terms_of_service_agreement', true);
    }
}
