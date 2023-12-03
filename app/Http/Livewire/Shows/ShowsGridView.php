<?php
namespace App\Http\Livewire\Shows;

use App\Models\Show;
use LaravelViews\Views\GridView;
use Illuminate\Database\Eloquent\Builder;

class ShowsGridView extends GridView
{
    protected $model = Show::class;
    public $maxCols = 3;
    public $cardComponent = 'livewire.shows.grid-view-item';

    public $searchBy = [
        'name', // Name of the show
        'description', // Description of the show
        'genre', // Genre of the show
        'rating', // Rating of the show
        // Add more fields as necessary
    ];

    public function repository(): Builder
    {
        // Adjust the query to fit the Show model
        return Show::query()
            // Remove 'with(['title'])' if 'title' is not a relationship
            // If you have relationships like 'categories', you can eager load them here
            ->when(request()->user()->can('manage', Show::class), function ($query) {
                $query->withTrashed();
            });
    }

    public function card($model)
    {
        return [
            'image' => $model->imageUrl(), // Assuming Show has an imageUrl method
            'title' => $model->name,
            'description' => $model->description,
            'genre' => $model->genre, // Assuming Show has a genre field
            'rating' => $model->rating, // Assuming Show has a rating field
            // Add more fields as necessary
        ];
    }
}
