<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Karim',
            'email' => 'karim@gmail.com',
            'phone'=>'12345678901',
            'password' => bcrypt('asdf'),
            'verification'=>'1'
        ]);
        \App\Models\User::create([
            'name' => 'Rahim',
            'email' => 'rahim@gmail.com',
            'phone'=>'12345678901',
            'password' => bcrypt('asdf'),
            'verification'=>'1'
        ]);
    }
}
