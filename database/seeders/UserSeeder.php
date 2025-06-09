<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    \DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // foreign key constraint বন্ধ

    User::truncate(); // এখন truncate কাজ করবে

    \DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // আবার চালু

    // Creating 4 users
    User::create([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => Hash::make('22222222'),
    ]);

    User::create([
        'name' => 'John Doe',
        'email' => 'user@example.com',
        'password' => Hash::make('22222222'),
    ]);

    User::create([
        'name' => 'Jane Smith',
        'email' => 'jane@example.com',
        'password' => Hash::make('password123'),
    ]);

    User::create([
        'name' => 'Mike Johnson',
        'email' => 'mike@example.com',
        'password' => Hash::make('password123'),
    ]);
}

}
