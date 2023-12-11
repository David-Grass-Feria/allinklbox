<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'id'        => 1,
            'font'      => 'roboto',
            'brand_color'     => '#E2003D',
            'brand_name'     => 'Allinklbox',


        ]);
    }
}
