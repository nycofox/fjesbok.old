<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()
            ->with('media')
            ->paginate(20);

        return view('dashboard')->with(compact('posts'));
    }
}
