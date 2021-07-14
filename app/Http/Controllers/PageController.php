<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($page) {
        if(!$this->pageExists($page)) {
            abort(404);
        }

        return view('page', [
            'page' => $page
        ]);

    }

    private function pageExists($page): bool
    {
        if(!file_exists(resource_path('views/pages/' . $page . '.blade.php'))) {
            return false;
        }

        return true;

    }

}
