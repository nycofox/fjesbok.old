<?php

namespace App\Http\Controllers\Admin\Webcomics;

use App\Http\Controllers\Controller;
use App\Models\Media;
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
            'slug' => ['required', Rule::unique('webcomics')->ignore($webcomic->id),],
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $media = $this->storeLogo($request);

        $webcomic->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'author' => $request->author ?? null,
            'media_id' => $media,
        ]);

        return redirect(route('admin.webcomics.index'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:webcomics',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $media = $this->storeLogo($request);

        Webcomic::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'author' => $request->author ?? null,
            'media_id' => $media,
        ]);

        return redirect(route('admin.webcomics.index'));
    }

    private function storeLogo(Request $request): ?Media
    {
        if($request->has('logo')) {
            $path = $request->file('logo')->store('webcomics/logos');
            return Media::storeFromPath(
                $path,
                $request->file('logo')->getClientOriginalName(),
                md5_file($request->file('logo'))
            )->id();
        }

        return null;
    }
}
