<?php
//
//namespace App\Http\Repositories;
//
//use App\Models\Platform;
//use Illuminate\Database\Eloquent\Builder;
//use Illuminate\Database\Eloquent\Collection;
//
//class PlatformRepository
//{
//    public function async(string|null $search, array|null $selected): Collection
//    {
//        return Platform::query()
//            ->select('id', 'name')
//            ->orderBy('name')
//            ->when(
//                $search,
//                fn (Builder $query) => $query->where('name', 'like', "%{$search}%")
//            )
//            ->when(
//                $selected,
//                fn (Builder $query) => $query->whereIn('id', $selected),
//                fn (Builder $query) => $query
//            )
//            ->get();
//    }
//}


namespace App\Http\Repositories;

use App\Models\Category;
use App\Models\Platform;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class PlatformRepository
{
    public function select(string|null $search, array|null $selected): Collection
    {
        return Platform::query()
            ->select('id', 'name')
            ->orderBy('name')
            ->when(
                $search,
                fn (Builder $query) => $query->where('name', 'like', "%{$search}%")
            )
            ->when(
                $selected,
                fn (Builder $query) => $query->whereIn(
                    'id',
                    array_map(
                        fn (array $item) => $item['id'],
                        array_filter(
                            $selected,
                            fn ($item) => (is_array($item) && isset($item['id']))
                        )
                    )
                ),
                fn (Builder $query) => $query
            )
            ->get();
    }
}
