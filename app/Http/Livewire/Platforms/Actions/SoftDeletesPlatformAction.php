<?php

namespace App\Http\Livewire\Platforms\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class SoftDeletesPlatformAction extends Action
{
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = '';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('platforms.actions.destroy');
    }

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = 'trash-2';

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($model, View $view)
    {
        $view->dialog()->confirm([
            'title' => __('platforms.dialogs.soft_deletes.title'),
            'description' => __('platforms.dialogs.soft_deletes.description', [
                'title' => $model->title
            ]),
            'icon' => 'question',
            'iconColor' => 'text-red-500',
            'accept' => [
                'label' => __('translation.yes'),
                'method' => 'softDeletes',
                'params' => $model->id,
            ],
            'reject' => [
                'label' => __('translation.no'),
            ],
        ]);
    }

    public function renderIf($model, View $view)
    {
        return request()->user()->can('delete', $model);
    }
}
