<?php

declare(strict_types=1);

namespace Tests\Feature\Backend\Profile;

use App\Http\Livewire\Profile\EditDetails;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    public function testUserCanEditProfile()
    {
        $user = User::factory()->create([
            'name' => 'old-name',
            'email' => 'test2@localhost',
        ]);

        Auth::shouldReceive('user')->andreturn($user);
        $test = Livewire::test(EditDetails::class);
        $test->set('isActive', true)
            ->set('name', 'new-name')
            ->set('email', 'test@localhost')
            ->call('save');

        $this->assertDatabaseMissing('users', [
            'name' => 'old-name',
            'email' => 'test2@localhost',
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'new-name',
            'email' => 'test@localhost',
        ]);
    }

    public function testEditingEmailResetsVerification()
    {

    }
}
