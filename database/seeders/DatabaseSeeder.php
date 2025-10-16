<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',             // Thêm dòng này
            'email' => 'thaovu.dev17@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123456'), // Nếu cần mật khẩu
        ]);
    }
}
