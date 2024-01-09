<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'type' => null,
            'business_type' => null,
            'business_name' => null,
            'email' => 'admin@admin.com',
            'email_verified_at' => '2024-01-01',
            'password' => 'password',
            'is_admin' => true
        ]);
    }
}
