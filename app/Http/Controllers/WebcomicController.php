<?php

namespace App\Http\Controllers;

use App\Models\Webcomic;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WebcomicController extends Controller
{
    /**
     * Display all webcomics for a given day
     *
     * @param null $date
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($date = null)
    {
        $date = Carbon::now();

        return view('webcomics.show',
        [
            'date' => $date
        ]);
    }

    /**
     * Display all available webcomics
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('webcomics.index', [
            'webcomics' => Webcomic::orderBy('name')->with('sources')->get(),
        ]);
    }

    /**
     * Store a users preference of which webcomics to show
     *
     * @param Request $request
     */
    public function store(Request $request)
    {

    }

}
