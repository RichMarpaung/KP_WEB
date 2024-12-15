<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRoleId = DB::table('roles')->where('name', 'admin')->value('id');
        $userRoleId = DB::table('roles')->where('name', 'user')->value('id');

        // Data users yang akan diinsert
        $users = [
            [
                'role_id' => $adminRoleId,
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('1'), // Gunakan Hash::make untuk hashing password
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_id' => $userRoleId,
                'name' => 'Regular User',
                'email' => 'user@example.com',
                'password' => Hash::make('1'),
                'status' => 'Belum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data ke tabel users
        DB::table('users')->insert($users);
    }
}
