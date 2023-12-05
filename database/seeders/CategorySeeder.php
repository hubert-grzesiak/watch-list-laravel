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
            'Action',
            'Adventure',
            'Animation',
            'Children',
            'Comedy',
            'Crime',
            'Documentary',
            'Drama',
            'Fantasy',
            'Film-Noir',
            'Horror',
            'Musical',
            'Mystery',
            'Romance',
            'Sci-Fi',
            'Thriller',
            'War',
            'Western',
        ];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}
