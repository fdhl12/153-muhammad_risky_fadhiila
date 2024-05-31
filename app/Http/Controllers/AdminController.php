<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Content;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Mengambil jumlah user
        $totalUsers = User::count();

        // Mengambil jumlah content
        $totalContents = Content::count();

        // Mengambil jumlah category
        $totalCategories = Category::count();

        // Mengirim data ke view admin.dashboard
        return view('admin.dashboard', compact('totalUsers', 'totalContents', 'totalCategories'));
    }
}
