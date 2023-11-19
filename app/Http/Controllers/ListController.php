<?php

namespace App\Http\Controllers;

use App\Models\WatchList;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'list.index'
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function manage()
//    {
//        $this->authorize('create', Category::class);
//        return view(
//            'list.form'
//        );
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $category
     * @return \Illuminate\Http\Response
     */
//    public function edit(Category $category)
//    {
//        $this->authorize('update', $category);
//        return view(
//            'categories.form',
//            [
//                'category' => $category
//            ]
//        );
//    }
}

