<?php

namespace App\Http\Livewire\Shows\Actions;

use Illuminate\Database\Eloquent\Model;
use App\Http\Livewire\Actions\SoftDeletesAction;

class SoftDeletesShowAction extends SoftDeletesAction
{
    /**
     * Tytuł okna dialogowego
     *
     * @return String
     */
    protected function dialogTitle(): String
    {
        return __('shows.dialogs.soft_deletes.title');
    }

    /**
     * Opis okna dialogowego
     *
     * @param Model $model
     * @return String
     */
    protected function dialogDescription(Model $model): String
    {
        return __('shows.dialogs.soft_deletes.description', [
            'title' => $model->title
        ]);
    }
}
