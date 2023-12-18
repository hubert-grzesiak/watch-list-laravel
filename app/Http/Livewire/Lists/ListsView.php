<?php

namespace App\Http\Livewire\Lists;

use App\Models\Show;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\ListView;

use App\Models\Category;
use WireUi\Traits\Actions;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use LaravelViews\Actions\RedirectAction;
use App\Http\Livewire\Filters\SoftDeletedFilter;
use App\Http\Livewire\Categories\Actions\EditCategoryAction;
use App\Http\Livewire\Categories\Actions\RestoreCategoryAction;
use App\Http\Livewire\Categories\Actions\SoftDeletesCategoryAction;
class ListsView extends ListView
{
    /**
     * Sets a model class to get the initial data
     */
    public $itemComponent = 'livewire.lists.list-view-item';

    public function repository(): Builder
    {
        return Show::query()
            ->whereHas('users', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->with(['users' => function ($query) {
                $query->withPivot('current_episode', 'watched');
            }]);
    }
    /**
     * Sets the properties to every list item component
     *
     * @param $model Current model for each card
     */
    public function data($model):array
    {
        // Find the pivot data for the currently logged-in user
        $pivotData = $model->users->where('id', auth()->id())->first()->pivot ?? null;

        $current_episode = $pivotData ? $pivotData->current_episode : null;
        $watched = $pivotData ? $pivotData->watched : null;

        return [
            'image' => str_contains($model->image, 'http') ? $model->image : $model->imageUrl() ,
            'title' => $model->title,
            'type' => $model->type,
            'numberOfEpisodes' => $model->numberOfEpisodes,
            'current_episode' => $current_episode,
            'watched' => $watched,
        ];
    }
    public $searchBy = [
        'title',
    ];
    public function sortableBy()
    {
        return [
            'Year' => 'year',
            'Rating' => 'rating',
            'NumberOfEpisodes' => 'numberOfEpisodes',
        ];
    }
    protected $paginate = 20;


}
