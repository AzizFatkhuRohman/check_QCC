<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Administrator',
            'email' => 'rahmat@toyota.co.id',
            'role'=>'admin',
            'password'=>Hash::make('tmmin123')
        ]);
        User::create([
            'name' => 'Supplier',
            'email' => 'supplier@toyota.co.id',
            'role'=>'supplier',
            'password'=>Hash::make('tmmin123')
        ]);
    }
}
