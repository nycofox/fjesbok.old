<?php

namespace App\Http\Controllers\Admin\Webcomics;

use App\Http\Controllers\Controller;
use App\Models\Webcomic;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WebcomicController extends Controller
{
    public function index()
    {
        return view('admin.webcomics.index', [
            'webcomics' => Webcomic::orderBy('name')->withCount('sources')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.webcomics.create');
    }

    public function edit(Webcomic $webcomic)
    {
        return view('admin.webcomics.edit', [
            'webcomic' => $webcomic
        ]);
    }

    public function update(Webcomic $webcomic, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => ['required', Rule::unique('webcomics')->ignore($webcomic->id),],
        ]);

        $webcomic->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'author' => $request->author ?? null,
        ]);

        return redirect(route('admin.webcomics.index'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => ['required', 'unique:webcomics'],
        ]);

        Webcomic::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'author' => $request->author ?? null,
        ]);

        return redirect(route('admin.webcomics.index'));
    }
}
