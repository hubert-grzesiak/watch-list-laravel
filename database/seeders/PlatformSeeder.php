<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $platforms = [
            'Netflix',
            'Amazon Prime Video',
            'Disney+',
            'HBO Max',
            'Hulu',
            'Apple TV+',
            'Peacock',
            'Paramount+',
            'YouTube Premium',
            'Crunchyroll'
        ];

        foreach ($platforms as $name) {
            Platform::create(['name' => $name]);
        }
    }
}
