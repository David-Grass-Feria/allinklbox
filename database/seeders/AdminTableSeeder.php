<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        (new \App\Actions\Fortify\CreateNewUser())->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'password',
            'password_confirmation' => 'password',

        ]);
    }
}
