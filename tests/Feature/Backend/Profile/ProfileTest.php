<?php

declare(strict_types=1);

namespace Tests\Feature\Backend\Profile;

use App\Http\Livewire\Profile\EditDetails;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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

        $component = new EditDetails();
        $component->name = 'new-name';
        $component->email = 'test@localhost';
        $component->save();

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
            'name' => 'old-name',
            'email' => 'test2@localhost',
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'new-name',
            'email' => 'test@localhost',
        ]);
    }

    public function testEditingEmailResetsVerification()
    {
        $user = User::factory()->create([
            'email' => 'test2@localhost',
            'email_verified_at' => Carbon::now()->subWeek(),
        ]);

        Auth::shouldReceive('user')->andreturn($user);

        $component = new EditDetails();
        $component->name = 'new-name';
        $component->email = 'test@localhost';
        $component->save();

        $this->assertDatabaseHas('users', [
            'name' => 'new-name',
            'email' => 'test@localhost',
            'email_verified_at' => null,
        ]);
    }
}
