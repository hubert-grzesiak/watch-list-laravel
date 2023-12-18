<?php

namespace App\Http\Controllers;

use App\Http\Repositories\PlatformRepository;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class PlatformController extends Controller
{
    protected $platformRepository;
// Dependency injection via constructor
    public function __construct(PlatformRepository $platformRepository)
    {
        $this->platformRepository = $platformRepository;
    }
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
     * Return list of resources
     *
     * @param Request $request
     * @return void
     */
//    public function async(Request $request)
//    {
//        return $this->platformRepository->async(
//            $request->search,
//            $request->input('selected', [])
//        );
//    }
    public function async(Request $request, PlatformRepository $repository)
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

