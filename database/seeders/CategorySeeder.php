<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Akcja',
            'Komedia',
            'Dramat',
            'Thriller',
            'Horror',
            'Science Fiction',
            'Fantasy',
            'Romans',
            'Przygodowy',
            'Kryminał',
            'Biograficzny',
            'Dokumentalny',
            'Wojenny',
            'Musical',
            'Animowany',
            'Historyczny',
            'Western',
            'Film Noir',
            'Indie',
            'Młodzieżowe',
            'Dla dzieci',
            'Muzyczny',
            'Sportowy',
            'Edukacyjny',
            'Mockument',
            'Eksperymentalny',
            'Antologia',
            'Czarna komedia',
            'Superbohaterowie',
            'Polityczny',
            'Postapokaliptyczny',
            'Film katastroficzny',
            'Mockbuster',
            'Silent Film',
            'Vintage',
            'Cyberpunk'
        ];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}
