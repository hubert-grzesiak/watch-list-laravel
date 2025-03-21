<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CategoryRepository;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Category::class);
        return view(
            'categories.index'
        );
    }

    /**
* Return list of resources
*
* @param Request $request
* @return void
*/
    public function async(Request $request, CategoryRepository $repository)
    {
        return $repository->select(
            $request->search,
            $request->selected
        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Category::class);
        return view(
            'categories.form'
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $this->authorize('update', $category);
        return view(
            'categories.form',
            [
                'category' => $category
            ]
        );
    }
}

