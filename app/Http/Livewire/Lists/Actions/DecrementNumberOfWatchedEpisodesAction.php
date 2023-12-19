<?php

namespace App\Http\Livewire\Lists\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class DecrementNumberOfWatchedEpisodesAction extends Action
{
    public $title = 'Decrement Watched Episodes';
    public $icon = 'minus'; // changed icon to 'minus'

    public function __construct()
    {
        parent::__construct();
        $this->title = __('Decrement watched episodes');
    }

    public function handle($model, View $view)
    {
        $userId = auth()->id();
        $user = auth()->user();

        $userShowProgress = $user->shows()
            ->where('shows.id', $model->id)
            ->withPivot('current_episode', 'id')
            ->first();

        if ($userShowProgress && $userShowProgress->pivot->current_episode > 0) {
            $user->shows()->updateExistingPivot($model->id, [
                'current_episode' => $userShowProgress->pivot->current_episode - 1
            ]);

        }
    }

    public function renderIf($model, View $view)
    {
        return request()->user()->can('update_own', $model);
    }
}
