<?php
namespace App\Http\Livewire\Shows;

use App\Http\Livewire\Shows\Filters\ShowFilter;
use App\Models\Show;
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
            'image' => str_contains($model->image, 'http') ? $model->image : $model->imageUrl() ,
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
