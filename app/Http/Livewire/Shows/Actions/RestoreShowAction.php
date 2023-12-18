<?php

namespace App\Http\Livewire\Shows\Actions;

use Illuminate\Database\Eloquent\Model;
use App\Http\Livewire\Actions\RestoreAction;

class RestoreShowAction extends RestoreAction
{
    /**
     * Tytuł okna dialogowego
     *
     * @return String
     */
    protected function dialogTitle(): String
    {
        return __('shows.dialogs.restore.title');
    }

    /**
     * Opis okna dialogowego
     *
     * @param Model $model
     * @return String
     */
    protected function dialogDescription(Model $model): String
    {
        return __('shows.dialogs.restore.description', [
            'title' => $model->title
        ]);
    }
}
