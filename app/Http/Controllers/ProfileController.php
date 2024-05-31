<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Content;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $contents = Content::where('user_id', $user->id)->get();
        $authUser = auth()->user();
        return view('profile', compact('user', 'contents', 'authUser'));
    }
}
