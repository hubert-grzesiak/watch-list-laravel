<?php

namespace App\Http\Livewire\Lists\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class IncrementNumberOfWatchedEpisodesAction extends Action
{
    public $title = 'Increment Watched Episodes';
    public $icon = 'plus';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('Increment watched episodes');
    }

    public function handle($model, View $view)
    {
        $userId = auth()->id();
        $user = auth()->user();

        // Assuming there's a method 'shows' defined in the User model that returns a BelongsToMany relationship
        $userShowProgress = $user->shows()
            ->where('shows.id', $model->id)
            ->withPivot('current_episode', 'id')
            ->first();

        if ($userShowProgress && $userShowProgress->pivot->current_episode < $model->numberOfEpisodes) {
            $user->shows()->updateExistingPivot($model->id, [
                'current_episode' => $userShowProgress->pivot->current_episode + 1
            ]);

        }
    }


    public function renderIf($model, View $view)
    {
        return request()->user()->can('update_own', $model);
    }
}
