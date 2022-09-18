<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        if (App::environment('local')) {
            $user = User::where(['email' => 'test@localhost'])->first();

            if($user === null)
            {
                $user = User::create([
                    'password' => bcrypt('secret12'),
                    'name' => 'Test User',
                    'email' => 'test@localhost'
                ]);
            }

            if($user->posts()->count()<5) {
                Post::factory(50)->create([
                    'user_id' => $user->id
                ]);
            }
        }
    }
}
