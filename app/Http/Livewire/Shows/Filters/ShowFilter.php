<?php
namespace App\Http\Livewire\Shows\Filters;

use LaravelViews\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class ShowFilter extends Filter
{
    public $title = 'Filter Shows';

    /**
     * Modify the current query when the filter is used
     *
     * @param Builder $query Current query
     * @param $value Value selected by the user
     * @return Builder Query modified
     */
    public function apply(Builder $query, $value, $request): Builder
    {
        if (isset($value['type'])) {
            $query->where('type', $value['type']);
        }

//        if (isset($value['genre'])) {
//            $query->where('genre', $value['genre']);
//        }

        return $query;
    }

    /**
     * Defines the title and value for each option
     *
     * @return Array associative array with the title and values
     */
    public function options(): array
    {
        return [
            'type' => [
                'Movie' => 'movie',
                'Series' => 'series',

            ],
//            'genre' => [
//                'Action' => 'action',
//                'Romance' => 'romance',
//
//            ],
        ];
    }
}
