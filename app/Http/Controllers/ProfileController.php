<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(ProfileUpdateRequest $request)
    {
        auth()->user()->update($request->only('name' , 'username' , 'email'));

        if ($request->input('password'))
        {
            auth()->user()->update(['password' => bcrypt($request->input('password'))]);
        };

        return redirect()->route('profile')->with('success' , 'Profile Is Updated!');
    }

    public function edit(User $profile)
    {
        return view('profile.edit' , compact('profile'));
    }
}
