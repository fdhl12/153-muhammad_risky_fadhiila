<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Category;
use App\Models\Reaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $contents = Content::where('title', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->orWhereHas('user', function ($q) use ($query) {
                    $q->where('username', 'LIKE', "%{$query}%")
                        ->orWhere('name', 'LIKE', "%{$query}%");
                })
                ->orderBy('created_at', 'desc')->paginate(10);
        } else {
            $contents = Content::with('user')->orderBy('created_at', 'desc')->paginate(12);
        }

        return view('contents.index', compact('contents', 'query'));
    }

    public function indexAdmin(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $contents = Content::where('title', 'LIKE', "%{$query}%")->get();
        } else {
            $contents = Content::with('user', 'category')->orderBy('created_at', 'desc')->paginate(10);
        }



        return view('admin.contents', compact('contents', 'query'));
    }

    //mengambil data contents sesuai dengan user yang dimiliki
    public function myStories(Request $request)
    {
        Log::info('Entering myStories method');
        $query = $request->input('query');
        $userId = Auth::id();
        Log::info('User ID: ' . $userId);

        if ($query) {
            Log::info('Query: ' . $query);
            $contents = Content::where('user_id', $userId)
                ->where(function ($q) use ($query) {
                    $q->where('title', 'LIKE', "%{$query}%")
                        ->orWhere('body', 'LIKE', "%{$query}%");
                })
                ->paginate(10);
        } else {
            $contents = Content::where('user_id', $userId)->orderBy('created_at', 'desc')->paginate(10);
        }

        Log::info('Content fetched successfully');
        return view('contents.mystories', compact('contents', 'query'));
    }
    public function like(Content $content)
    {
        $reaction = Reaction::firstOrCreate(
            ['user_id' => Auth::id(), 'content_id' => $content->id],
            ['like' => true]
        );

        if (!$reaction->wasRecentlyCreated) {
            $reaction->like = !$reaction->like;
            $reaction->save();
        }

        return redirect()->back();
    }

    public function comment(Request $request, Content $content)
    {
        $request->validate([
            'comment' => 'nullable|string|max:255',
        ]);

        Reaction::create([
            'comment' => $request->comment,
            'like' => false,
            'user_id' => Auth::id(),
            'content_id' => $content->id,
        ]);

        return redirect()->back();
    }


    public function create()
    {
        $categories = Category::all();
        return view('contents.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi data masukan
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('category_images', 'public');
        }

        Content::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'image' => $imagePath,
        ]);

        return redirect()->route('contents.index')->with('success', 'Content created successfully.');
    }

    public function show($id)
    {
        $content = Content::findOrFail($id);
        $content->increment('views');
        $category = $content->category;
        return view('contents.show', compact('content', 'category'));
    }

    public function edit(Content $content)
    {
        $categories = Category::all();
        return view('contents.edit', compact('content', 'categories'));
    }

    public function update(Request $request, Content $content)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $content->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.contents.index')->with('success', 'Content updated successfully.');
    }

    public function destroy(Content $content)
    {

        $content->delete();
        return redirect()->route('admin.contents.index')->with('success', 'Content deleted successfully.');
    }
}
