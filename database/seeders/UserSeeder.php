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


        //user 3
        $user3 =  User::create([
            'name' => "User 3",
            'email' => "user@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole(['user']);
        $user3->givePermissionTo(['edit_profile', 'change_password']);

        //user 4
        $user4 =  User::create([
            'name' => "User 4",
            'email' => "user2@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole(['user']);
        $user4->givePermissionTo(['edit_profile', 'change_password']);

        //user 5
        $user5 =  User::create([
            'name' => "User 5",
            'email' => "user3@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole(['user']);
        $user4->givePermissionTo(['edit_profile', 'change_password']);
    }
}
