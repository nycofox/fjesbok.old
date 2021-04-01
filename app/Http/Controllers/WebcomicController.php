<?php

namespace App\Http\Controllers;

use App\Models\Webcomic;
use App\Models\WebcomicStrip;
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
        if(!$date = $this->setDate($date))
        {
            abort(404);
        }

        return view('webcomics.show',
        [
            'date' => $date,
            'strips' => WebcomicStrip::where('date', $date->format('Y-m-d'))
                ->with('media')
                ->with('source')
                ->with('source.webcomic')
                ->get(),
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

    /**
     * Validates or sets date
     *
     * @param null $date
     * @return Carbon|null
     */
    private function setDate($date = null): ?Carbon
    {

        /*
         * If no date, set to today
         */
        if(!$date) {
            return Carbon::now();
        }

        /*
         * Parse date, return null if invalid
         */

        if(!Carbon::createFromFormat('Y-m-d', $date)) {
            return null;
        }

        /*
         * If date is in the future, return null
         */
        if(Carbon::createFromFormat('Y-m-d', $date)->isFuture()) {
            return null;
        }

        /*
         * If valid date, return Carbon instance of date
         */

        return Carbon::createFromFormat('Y-m-d', $date);

    }

}
