<?php

namespace Tests\Feature\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class ForgotPasswordTest extends TestCase
{
    use RefreshDatabase;

    protected function passwordRequestRoute(): string
    {
        return route('password.request');
    }

    protected function passwordEmailGetRoute(): string
    {
        return route('password.email');
    }

    protected function passwordEmailPostRoute(): string
    {
        return route('password.email');
    }

    public function testUserCanViewAnEmailPasswordForm(): void
    {
        $response = $this->withTosAgreed()->get($this->passwordRequestRoute());

        $response->assertSuccessful();
        $response->assertViewIs('auth.passwords.email');
    }

    public function testUserCanViewAnEmailPasswordFormWhenAuthenticated(): void
    {
        $user = User::factory()->make();

        $response = $this->withTosAgreed()->actingAs($user)->get($this->passwordRequestRoute());

        $response->assertSuccessful();
        $response->assertViewIs('auth.passwords.email');
    }

    public function testUserReceivesAnEmailWithAPasswordResetLink(): void
    {
        Notification::fake();
        $user = User::factory()->create([
            'email' => 'john@example.com',
        ]);

        /*$response = */$this->withTosAgreed()->post($this->passwordEmailPostRoute(), [
            'email' => 'john@example.com',
        ]);

        $this->assertNotNull($token = DB::table('password_resets')->first());
        Notification::assertSentTo($user, ResetPassword::class, function ($notification, $channels) use ($token) {
            self::assertContains('mail', $channels);
            return Hash::check($notification->token, $token->token) === true;
        });
    }

    public function testUserDoesNotReceiveEmailWhenNotRegistered()
    {
        Notification::fake();

        $response = $this->withTosAgreed()->from($this->passwordEmailGetRoute())->post($this->passwordEmailPostRoute(), [
            'email' => 'nobody@example.com',
        ]);

        $response->assertRedirect($this->passwordEmailGetRoute());
        $response->assertSessionHasErrors('email');
        Notification::assertNotSentTo(User::factory()->make(['email' => 'nobody@example.com']), ResetPassword::class);
    }

    public function testEmailIsRequired()
    {
        $response = $this->withTosAgreed()->from($this->passwordEmailGetRoute())->post($this->passwordEmailPostRoute(), []);

        $response->assertRedirect($this->passwordEmailGetRoute());
        $response->assertSessionHasErrors('email');
    }

    public function testEmailIsAValidEmail()
    {
        $response = $this->withTosAgreed()->from($this->passwordEmailGetRoute())->post($this->passwordEmailPostRoute(), [
            'email' => 'invalid-email',
        ]);

        $response->assertRedirect($this->passwordEmailGetRoute());
        $response->assertSessionHasErrors('email');
    }
}
