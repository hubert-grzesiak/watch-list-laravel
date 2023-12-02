<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Platform::class);

        return view(
            'platforms.index'
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('viewAny', Platform::class);

        return view(
            'platforms.form'
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $platform
     * @return \Illuminate\Http\Response
     */
    public function edit(Platform $platform)
    {
        $this->authorize('update', $platform);
        return view(
            'platforms.form',
            [
                'platform' => $platform
            ]
        );
    }
}

