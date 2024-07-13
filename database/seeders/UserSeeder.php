<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => config('superadmin.auth.name'),
            'email' => config('superadmin.auth.email'),
            'email_verified_at' => now(),
            'password' => config('superadmin.auth.password'),
            'role' => UserRole::ADMIN,
        ]);
    }
}
