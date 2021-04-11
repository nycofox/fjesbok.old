<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function edit()
    {
        return view('user.password')->with([
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'old_password' => ['required', new MatchOldPassword],
            'new_password' => 'required|string|confirmed|min:8|different:old_password',
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        flash('You have changed your password.')->success();

        return redirect(route('settings'));
    }
}
