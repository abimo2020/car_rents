<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([[
            'name' => 'Admin',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123123123'),
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Head Manager',
            'role' => 'head',
            'email' => 'head@gmail.com',
            'password' => Hash::make('123123123'),
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Head Manager',
            'role' => 'head',
            'email' => 'head1@gmail.com',
            'password' => Hash::make('123123123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]]);

        DB::table('cars')->insert([
            [
                'name' => 'Car A',
                'category' => 'people',
                'status' => 'owner',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Car B',
                'category' => 'goods',
                'status' => 'owner',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Car C',
                'category' => 'goods',
                'status' => 'rent',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
