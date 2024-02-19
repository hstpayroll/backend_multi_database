<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $user1 =  User::create([
            'name' => "Yetimeshet Tadesse",
            'email' => "yetimnew@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole(['superadmin']);

        $user1->givePermissionTo(['edit_profile', 'change_password']);

        $user2 =  User::create([
            'name' => "Yetimeshet 3",
            'email' => "test@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole(['admin']);

        $user2->givePermissionTo(['edit_profile', 'change_password']);

        }
}
