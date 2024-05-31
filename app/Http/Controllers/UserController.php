<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');


        if ($query) {
            $users = User::where('name', 'LIKE', "%{$query}%")
                ->orWhere('email', 'LIKE', "%{$query}%")
                ->orWhere('username', 'LIKE', "%{$query}%")
                ->paginate(10);
        } else {
            $users = User::orderBy('created_at', 'desc')->paginate(10);
        }

        return view('admin.users', compact('users', 'query'));
    }

    public function show($username)
    {


        $user = User::where('username', $username)->firstOrFail();
        return view('admin.user', compact('user'));
    }
    public function edit($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        if (Auth::user()->role !== 'admin' && Auth::user()->id !== $user->id) {
            return redirect('/')->with('error', 'You do not have access to this page.');
        }
        return view('admin.edit.user', compact('user'));
    }

    public function update(Request $request, $username)
    {
        $user = User::where('username', $username)->firstOrFail();

        if (Auth::user()->role !== 'admin' && Auth::user()->id !== $user->id) {
            return redirect('/')->with('error', 'You do not have access to this page.');
        }

        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:30|unique:users,username,' . $user->id,
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:50|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        dd($request->all());
        return redirect()->route('admin.users.show', $user->username)->with('success', 'User updated successfully');
    }
    public function destroy($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        if (Auth::user()->role !== 'admin' && Auth::user()->id !== $user->id) {
            return redirect('/')->with('error', 'You do not have access to this page.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Content deleted successfully.');
    }


    public function showRegisterForm()
    {
        return view('users.register');
    }

    public function showLoginForm()
    {
        return view('users.login');
    }
    public function register()
    {
        return view('admin.create.user');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:30|unique:users',
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'photo_profile' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo_profile' => $request->photo_profile,
            'role' => 'user',
        ]);

        return redirect()->route('admin.users.index');
    }

    // Login function
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function settings($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        return view('settings', compact('user'));
    }

    public function updateUser(Request $request, $username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:50|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('profile_photos', 'public');
            $user->photo_profile = $path;
        }

        $user->update();
        $user->save();

        return redirect()->route('settings', ['username' => $user->username])->with('success', 'User updated successfully');
    }


    public function uploadPhoto(Request $request, $username)
    {
        $user = User::where('username', $username)->firstOrFail();

        // Validasi input gambar
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan foto profil ke penyimpanan
        $path = $request->file('photo')->store('profile_photos', 'public');

        // Update kolom photo_profile pengguna dengan path foto profil yang baru
        $user->photo_profile = $path;
        $user->save();

        // Redirect atau kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Profile photo uploaded successfully.');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
