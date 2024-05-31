<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function show($categoryId)
    {
        $category = Category::with('images')->findOrFail($categoryId);
        return view('images.show', compact('category'));
    }
}
