<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PremiumUserSeeder extends Seeder
{
    public function run(): void
    {
        $premiumUsers = [
            [
                'name' => 'Tony Stark',
                'email' => 'tony@avengers.com',
                'password' => Hash::make('password'),
                'is_premium' => true,
            ],
            [
                'name' => 'Bruce Wayne',
                'email' => 'bruce@wayneenterprises.com',
                'password' => Hash::make('password'),
                'is_premium' => true,
            ],
            [
                'name' => 'Clark Kent',
                'email' => 'clark@dailyplanet.com',
                'password' => Hash::make('password'),
                'is_premium' => true,
            ],
            [
                'name' => 'Diana Prince',
                'email' => 'diana@amazon.com',
                'password' => Hash::make('password'),
                'is_premium' => true,
            ],
            [
                'name' => 'Peter Parker',
                'email' => 'peter@dailybugle.com',
                'password' => Hash::make('password'),
                'is_premium' => true,
            ],
        ];

        foreach ($premiumUsers as $user) {
            User::create($user);
        }

        $this->command->info('✅ 5 Premium Users created successfully!');
    }
}
