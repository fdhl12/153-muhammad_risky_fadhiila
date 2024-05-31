<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    // Untuk pengguna umum
    public function index()
    {

        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::with(['contents.user'])->findOrFail($id);
        $contents = $category->contents;

        return view('category', compact('category', 'contents'));
    }

    public function indexAdmin(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $categories = Category::where('name', 'LIKE', "%{$query}%")->get();
        } else {
            $categories = Category::all();
        }
        return view('admin.categories', compact('categories', 'query'));
    }

    public function showAdmin($id)
    {

        $category = Category::with('contents.user')->findOrFail($id); // Memuat kategori beserta konten dan pengguna
        $contents = $category->contents;

        return view('admin.show.category', compact('category', 'contents'));
    }
    // Method untuk menampilkan form pembuatan category baru
    public function create()
    {
        return view('admin.create.category');
    }
    public function store(Request $request)
    {
        // Validasi data masukan
        $request->validate([
            'name' => 'required|string|max:55'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('categories.index')->with('success', 'Content created successfully.');
    }

    // Method untuk menampilkan form pengeditan category
    public function edit($id)
    {
        // Mengambil data category dari database
        $category = Category::findOrFail($id);

        // Mengirim data ke view untuk ditampilkan dalam form pengeditan
        return view('admin.edit.category', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang dikirim oleh form
        $request->validate([
            'name' => 'required|string|max:255',
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        // Mengambil data category dari database
        $category = Category::findOrFail($id);

        // Mengupdate data category dengan data baru dari request
        $category->update($request->all());

        // Redirect ke halaman yang sesuai dengan pesan sukses
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        // $category = User::where('id', $id)->firstOrFail();
        // if (Auth::user()->role !== 'admin' && Auth::user()->id !== $category->id) {
        //     return redirect('/')->with('error', 'You do not have access to this page.');
        // }

        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Content deleted successfully.');
    }
}
