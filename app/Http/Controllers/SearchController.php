<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        $users = User::where('name', 'LIKE', "%{$query}%")
                     ->orWhere('email', 'LIKE', "%{$query}%")
                     ->orWhere('username', 'LIKE', "%{$query}%")
                     ->get();
                     
        $categories = Category::where('name', 'LIKE', "%{$query}%")->get();
        
        $contents = Content::where('title', 'LIKE', "%{$query}%")->get();
        
        return view('admin.search.results', compact('users', 'categories', 'contents', 'query'));
    }
}
