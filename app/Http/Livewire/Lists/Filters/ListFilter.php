<?php
namespace App\Http\Livewire\Lists\Filters;

use LaravelViews\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class ListFilter extends Filter
{
    public $title = 'Filter Lists';

    /**
     * Modify the current query when the filter is used
     *
     * @param Builder $query Current query
     * @param $value Value selected by the user
     * @return Builder Query modified
     */
    public function apply(Builder $query, $value, $request): Builder
    {
        if ($value == 'movie') {
            // If the value is 'movie', filter results to only include movies
            return $query->where('type', 'movie');
        } else {
            // If the value is not 'movie', assuming it should be 'series' based on your context
            return $query->where('type', 'series');
        }
    }

    /**
     * Defines the title and value for each option
     *
     * @return Array associative array with the title and values
     */
    public function options(): array
    {
        return [
            'Movies' => 'movie',
            'Series' => 'series',
        ];
    }
}
