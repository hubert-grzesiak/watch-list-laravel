<?php

namespace App\Http\Livewire\Lists;

use App\Models\Category;
use App\Models\Show;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;

class ListTableView extends TableView
{

    private static int $counter;

    public function repository(): Builder
    {
        self::$counter = 0;

        return Show::query()
            ->whereHas('users', function ($query) {
                $query->where('user_id', auth()->id());
            })

            ->with(['users' => function ($query) {
                $query->where('user_id', auth()->id())
                    ->withPivot('current_episode', 'watched');
            }]);
    }

    public function headers(): array
    {
        return [
            Header::title('#')->sortBy('id'),
            Header::title(__('shows.attributes.image')),
            Header::title(__('shows.attributes.title'))->sortBy('title'),
            Header::title(__('shows.attributes.type'))->sortBy('type'),
            Header::title(__('shows.attributes.numberOfEpisodes'))->sortBy('numberOfEpisodes'),
            Header::title(__('shows.attributes.current_episode'))->sortBy('current_episode'),

        ];
    }

    public function row($model): array
    {
        self::$counter++;

        // Find the pivot data for the currently logged-in user
        $pivotData = $model->users->where('id', auth()->id())->first()->pivot ?? null;

        $current_episode = $pivotData ? $pivotData->current_episode : null;
        $watched = $pivotData ? $pivotData->watched : null;

        return [
            // Assume 'image' is a direct attribute of the Show model
            'id' => self::$counter,
            $model->image ? '<img class="w-[120px] h-[120px] object-cover" src="' . htmlspecialchars($model->image) . '" alt="' . htmlspecialchars($model->title) . '" />' : '',
            'title' => $model->title,
            'type' => $model->type,
            'numberOfEpisodes' => $model->numberOfEpisodes,
            'current_episode' => $current_episode,
//            'watched' => $watched,
        ];
    }
    public $searchBy = [
        'title',
    ];
    public function sortableBy()
    {
        return [
//            'Year' => 'year',
//            'Rating' => 'rating',
//            'NumberOfEpisodes' => 'numberOfEpisodes',
        ];
    }
    protected $paginate = 20;
}
