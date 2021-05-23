<?php

namespace App\Http\Controllers\Admin\Webcomics;

use App\Http\Controllers\Controller;
use App\Models\Webcomic;
use App\Models\WebcomicSource;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WebcomicSourceController extends Controller
{

    private $rules = [
        'homepage' => ['required', 'url'],
        'searchpage' => ['nullable'],
        'baseurl' => ['nullable'],
        'searchstring' => ['required'],
        'scraper' => ['required'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @param Webcomic $webcomic
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Webcomic $webcomic)
    {
        return view('admin.webcomics.sources.index', [
            'webcomic' => $webcomic,
            'sources' => WebcomicSource::where('webcomic_id', $webcomic->id)->withCount('strips')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param Webcomic $webcomic
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Webcomic $webcomic)
    {
        return view('admin.webcomics.sources.create', [
            'webcomic' => $webcomic,
            'scrapers' => $this->scrapers()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Webcomic $webcomic
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Webcomic $webcomic, Request $request)
    {
        $request->validate($this->rules);

        $webcomic->sources()->create([
            'homepage' => $request->homepage,
            'searchpage' => $request->searchpage ?? null,
            'baseurl' => $request->baseurl ?? null,
            'searchstring' => $request->searchstring ?? null,
            'scraper' => $request->scraper ?? 'App\Scrapers\Webcomics\Searchscraper',
            'active' => $request->active ?? false,
        ]);

        return redirect(route('admin.webcomics.sources', $webcomic));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebcomicSource  $webcomicSource
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Webcomic $webcomic, WebcomicSource $source)
    {
        return view('admin.webcomics.sources.edit', [
            'webcomic' => $webcomic,
            'source' => $source,
            'scrapers' => $this->scrapers()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebcomicSource  $webcomicSource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Webcomic $webcomic, WebcomicSource $source)
    {
        $request->validate($this->rules);

        $source->update([
            'homepage' => $request->homepage,
            'searchpage' => $request->searchpage ?? null,
            'baseurl' => $request->baseurl ?? null,
            'searchstring' => $request->searchstring,
            'scraper' => $request->scraper ?? 'App\Scrapers\Webcomics\Searchscraper',
            'active' => $request->active ?? false,
        ]);

        return redirect(route('admin.webcomics.sources', $webcomic));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebcomicSource  $webcomicSource
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebcomicSource $webcomicSource)
    {
        //
    }

    public function scrape(Webcomic $webcomic, WebcomicSource $source)
    {
        \Artisan::call('webcomics:scrape', ['source' => $source->id]);

        return \Artisan::output();
    }

    private function scrapers(): array
    {
        return [
            'App\Scrapers\Webcomic\SearchScraper' => 'Search',
            'App\Scrapers\Webcomic\GenerateScraper' => 'Generate',
        ];
    }
}
