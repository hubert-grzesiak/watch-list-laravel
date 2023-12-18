<?php
namespace App\Http\Livewire\Shows;

use App\Http\Livewire\Shows\Filters\ShowFilter;
use App\Models\Show;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use LaravelViews\Views\GridView;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Livewire\Shows\Actions\EditShowAction;
use WireUi\Traits\Actions;
use App\Http\Livewire\Traits\Restore;
use Illuminate\Database\Eloquent\Model;
use App\Http\Livewire\Traits\SoftDeletes;
use App\Http\Livewire\Shows\Actions\RestoreShowAction;
use App\Http\Livewire\Shows\Actions\SoftDeletesShowAction;
class ShowsGridView extends GridView
{
    use Actions;
    use SoftDeletes;
    use Restore;

    protected $model = Show::class;
    public $maxCols = 5;
    public $cardComponent = 'livewire.shows.grid-view-item';

    public $searchBy = [
        'title', // Name of the show
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
        return Show::query()
            ->when(request()->user()->can('manage', Show::class), function ($query) {
                $query->withTrashed();
            });
    }

    public function addToWatchlist($showId)
    {
        if (!Auth::check()) {
            $this->emit('alert', 'You need to be logged in.');
            return;
        }

        $userId = Auth::id();

        // Check if the show is already in the watchlist
        $exists = DB::table('user_show_progress')
            ->where('user_id', $userId)
            ->where('show_id', $showId)
            ->exists();

        if ($exists) {
            // If it exists, remove it from the watchlist
            DB::table('user_show_progress')
                ->where('user_id', $userId)
                ->where('show_id', $showId)
                ->delete();

            $this->emit('alert', 'Show removed from your watchlist.');
        } else {
            // If it doesn't exist, add it to the watchlist
            DB::table('user_show_progress')->insert([
                'user_id' => $userId,
                'show_id' => $showId,
                'watched' => false,
                'current_episode' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $this->emit('alert', 'Show added to your watchlist.');
        }

        // Optional: Refresh the component to reflect the change
    }


    public function card($model)
    {
        $userId = Auth::id();
        $isInWatchlist = DB::table('user_show_progress')
            ->where('user_id', $userId)
            ->where('show_id', $model->id)
            ->exists();

        return [
            'id' => $model->id,
            'image' => str_contains($model->image, 'http') ? $model->image : $model->imageUrl() ,
            'title' => $model->title,
            'description' => $model->description,
            'genre' => $model->genre,
            'rating' => $model->rating,
            'year' => $model->year,
            'isInWatchlist' => $isInWatchlist,
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

    /** Actions by item */
    protected function actionsByRow()
    {
        if (request()->user()->can('manage', Show::class)) {
            return [
                new EditShowAction('shows.edit', __('translation.actions.edit')),
                new SoftDeletesShowAction(),
                new RestoreShowAction(),
            ];
        }
    }
    protected function softDeletesNotificationDescription(Model $model)
    {
        return __('shows.messages.successes.destroyed', [
            'title' => $model->title
        ]);
    }

    protected function restoreNotificationDescription(Model $model)
    {
        return __('shows.messages.successes.restored', [
            'title' => $model->title
        ]);
    }
}
