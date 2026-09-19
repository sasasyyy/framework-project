<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Buat Akun Admin
        User::create([
            'name' => 'Admin Toko',
            'email' => 'admin@barokahmart.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Buat Akun Kasir
        User::create([
            'name' => 'Kasir Imas Anisa',
            'email' => 'kasir@barokahmart.test',
            'password' => Hash::make('password'),
            'role' => 'kasir',
        ]);

        // Opsional: panggil seeder lain jika ada
        // $this->call(CategorySeeder::class);
    }
}