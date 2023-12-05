<?php
namespace App\Http\Livewire\Shows;

use App\Http\Livewire\Shows\Filters\ShowFilter;
use App\Models\Show;
use LaravelViews\Views\GridView;
use Illuminate\Database\Eloquent\Builder;

class ShowsGridView extends GridView
{
    protected $model = Show::class;
    public $maxCols = 5;
    public $cardComponent = 'livewire.shows.grid-view-item';

    public $searchBy = [
        'title', // Name of the show
        'genre', // Genre of the show
        'rating', // Rating of the show
    ];
    public function sortableBy()
    {
        return [
            'Year' => 'year',
            'Rating' => 'rating'
        ];
    }
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
            'id' => $model->id,
            'image' => $model->image,
            'title' => $model->title,
            'description' => $model->description,
            'genre' => $model->genre,
            'rating' => $model->rating,
            'year' => $model->year,
        ];
    }

    /**
     * Set filters
     */
    protected function filters()
    {
        return [
            new ShowFilter,
        ];
    }
}
