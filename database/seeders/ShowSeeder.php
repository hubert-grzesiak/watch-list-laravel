<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Platform;
use App\Models\Show;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $allPlatforms = Platform::pluck('name')->toArray();

        // Dodaj to na początku metody run()
        $seriesResponse = Http::withHeaders([
            'X-RapidAPI-Key' => '187be517abmsh78c015f5ff043aap196e49jsnf27b23139ad6',
            'X-RapidAPI-Host' => 'imdb-top-100-movies.p.rapidapi.com'
        ])->get('https://imdb-top-100-movies.p.rapidapi.com/series/');

        if ($seriesResponse->successful()) {
            $series = $seriesResponse->json();

            foreach ($series as $serie) {
                $randomPlatform = $allPlatforms[array_rand($allPlatforms)];

                $show = Show::create([
                    'title' => $serie['title'],
                    'description' => $serie['description'],
                    'image' => $serie['image'],
                    'genre' => implode(', ', $serie['genre']), // Jeśli gatunek jest tablicą.
                    'rating' => $serie['rating'],
                    'year' => $serie['year'],
                    'numberOfEpisodes' => rand(10, 50), // Dla seriali dodajemy losową liczbę odcinków
                    'platform' => $randomPlatform,
                    'type'=> 'serie'
                ]);
                // Log the information to the console.
                Log::info('Added series to database:', [
                    'Title' => $show->title,
                    'Year' => $show->year,
                    'Rating' => $show->rating
                ]);
            }
        } else {
            throw new \Exception('Failed to retrieve series from API: ' . $seriesResponse->status());
        }

        $response = Http::withHeaders([
            'X-RapidAPI-Host' => 'imdb-top-100-movies.p.rapidapi.com',
            'X-RapidAPI-Key' => '187be517abmsh78c015f5ff043aap196e49jsnf27b23139ad6'
        ])->get('https://imdb-top-100-movies.p.rapidapi.com/');

        if ($response->successful()) {
            $movies = $response->json();

            foreach ($movies as $movie) {
                $randomPlatform = $allPlatforms[array_rand($allPlatforms)];

                $show = Show::create([
                    'title' => $movie['title'],
                    'description' => $movie['description'],
                    'image' => $movie['image'],
                    'genre' => implode(', ', $movie['genre']), // Jeśli gatunek jest tablicą.
                    'rating' => $movie['rating'],
                    'year' => $movie['year'],
                    'numberOfEpisodes' => 1,
                    'platform' => $randomPlatform,
                    'type' => 'movie'
                ]);
                // Log the information to the console.
                Log::info('Added movie to database:', [
                    'Title' => $show->title,
                    'Year' => $show->year,
                    'Rating' => $show->rating
                ]);
            }
        } else {
            throw new \Exception('Failed to retrieve data from API: ' . $response->status());
        }
    }
}
