<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profile.show')->with([
            'user' => $user,
            'posts' => $user->posts,
            'postcount' => $user->posts->count(),
            'commentcount' => $user->comments()->count(),
        ]);
    }
}
