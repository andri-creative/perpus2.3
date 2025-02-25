<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function Index_View()
    {
        $user = Auth::user();

        return view('dashboard.pages.view-profile', compact('user'));
    }

    public function Index_User()
    {
        $user = Auth::user();

        return view('dashboard.pages.add-user', compact('user'));
    }

    public function Create_User(Request $req)
    {
        $val = $req->validate([
            'name_user' => 'required|string',
            'email_user' => 'required|email|unique:users,email',
            'position_user' => 'required|string',
            'password_user' => 'required'
        ]);

        $password_has = bcrypt($val['password_user']);

        $user = new User([
            'name' => $val['name_user'],
            'email' => $val['email_user'],
            'position' => $val['position_user'],
            'password' => $password_has
        ]);

        $user->save();

        return back()->with('success', 'User berhasil ditambahkan.');
    }


    // Login
    public function Create_Login(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // dd($req);

        $credentials = $req->only('email', 'password');
        $remember = $req->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            Log::info('User logged in: ', ['user' => Auth::user()]);
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($req->except('password'));
    }

    public function Update_User(Request $req,  $id)
    {
        $user = User::findOrFail($id);

        $req->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string',
            'bio' => 'nullable|string',
        ]);


        $user->update([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'bio' => $req->bio,
            'position' => $req->position,
        ]);

        return back()->with('success', 'Profile berhasil diperbarui.');
    }

    public function Update_UserFoto(Request $request, $id)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('photo')) {
            $currentDateTime = Carbon::now()->format('HisdmY');

            $photoName = $currentDateTime . '.' . $request->photo->getClientOriginalExtension();

            $request->photo->move(public_path('images/upload'), $photoName);
            if ($user->photo && File::exists(public_path('images/upload/' . $user->photo))) {
                File::delete(public_path('images/upload/' . $user->photo));
            }
            $user->photo = $photoName;
            $user->save();
        }

        return back()->with('success', 'Profile photo updated successfully.');

    }

    public function Update_UserPassword(Request $req, $id)
    {
        $user = User::findOrFail($id);

        $req->validate([
            'passwo' => 'required|string',
        ]);

    }



    // User List
    public function Index_UserList()
    {
        $user_list = User::all();
        $user = Auth::user();

        return view('dashboard.pages.user-list', compact('user_list', 'user'));
    }


    public function Logout_User()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('home');
    }

}