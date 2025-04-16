<?php

namespace Database\Seeders;

// Import necessary classes
use App\Models\User; // Assuming your User model is in App\Models
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Import Hash facade for password hashing

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create an Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com', // Use a unique email
            'role' => 'admin',
            'email_verified_at' => now(), // Mark email as verified immediately
            'password' => Hash::make('password'), // Hash the password! Don't store plain text. Change 'password' to a secure default if needed.
            // 'remember_token' is usually handled automatically by Laravel
        ]);

        // 2. Create a Siswa (Student) User
        User::create([
            'name' => 'Siswa User',
            'email' => 'siswa@example.com', // Use a unique email
            'role' => 'siswa',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Use the same or different default password
        ]);

        // 3. Create a Bank User
        User::create([
            'name' => 'Bank User',
            'email' => 'bank@example.com', // Use a unique email
            'role' => 'bank',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Use the same or different default password
        ]);

        // You can add more users if needed using the same structure
        // Example: Another student
        /*
        User::create([
            'name' => 'Siswa Dua',
            'email' => 'siswa2@example.com',
            'role' => 'siswa',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
        */

        // If you need a large number of test users (especially for 'siswa'),
        // consider using Model Factories for more efficient generation.
        // Example using a factory (assuming you have a UserFactory defined):
        // \App\Models\User::factory(10)->create(['role' => 'siswa']);
    }
}