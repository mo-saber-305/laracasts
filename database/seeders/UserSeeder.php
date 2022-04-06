<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([
            'name' => 'Super Admin',
            'username' => 'super_admin',
            'email' => 'admin@demo.com',
            'image' => "https://i.pravatar.cc/150?u=super_admin",
            'password' => Hash::make('mo saber'),
        ]);

        User::factory(30)->create();
    }
}
