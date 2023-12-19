<?php
namespace App\Http\Livewire\Shows\Filters;

use LaravelViews\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class ShowFilter extends Filter
{
    public $title = 'Filter Shows';

    public function apply(Builder $query, $value, $request): Builder
    {
        $userId = auth()->id();

        switch ($value) {
            case 'movie':
                return $query->where('type', 'movie');
            case 'series':
                return $query->where('type', 'series');
            case 'watching':
                return $query->whereHas('users', function ($subQuery) use ($userId) {
                    $subQuery->where('user_id', $userId)
                        ->whereRaw('current_episode > 0 AND current_episode < numberOfEpisodes');
                });
            case 'completed':
                return $query->whereHas('users', function ($subQuery) use ($userId) {
                    $subQuery->where('user_id', $userId)
                        ->whereColumn('current_episode', 'numberOfEpisodes');
                });
            case 'plan_to_watch':
                return $query->whereHas('users', function ($subQuery) use ($userId) {
                    $subQuery->where('user_id', $userId)
                        ->where('current_episode', 0);
                });
        }

        return $query;
    }

    public function options(): array
    {
        return [
            'Movies' => 'movie',
            'Series' => 'series',
            'Currently Watching' => 'watching',
            'Completed' => 'completed',
            'Plan To Watch' => 'plan_to_watch',
        ];
    }
}
