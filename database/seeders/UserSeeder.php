<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'no_anggota' => 'admin1',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'registration_date' => now(),
            'gender' => 'Laki-laki',
            'level' => 'Admin',
            'remember_token' => \Str::random(10),
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'no_anggota' => 'user1',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'registration_date' => now(),
            'gender' => 'Perempuan',
            'level' => 'Anggota',
            'remember_token' => \Str::random(10),
        ]);
        User::create([
            'name' => 'Merchant',
            'email' => 'merchant@merchant.com',
            'no_anggota' => 'merchant1',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'registration_date' => now(),
            'gender' => 'Perempuan',
            'level' => 'Anggota',
            'remember_token' => \Str::random(10),
        ]);
    }
}
