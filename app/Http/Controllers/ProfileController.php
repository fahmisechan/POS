<?php

namespace App\Http\Controllers;

use App\User;
use App\Admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('profile.index',compact('user'));
    }
    public function store(Request $request)
    {
        $insert = User::create($request->all());
        return redirect('/akun');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/akun');
    }
    public function detail($id)
    {
        $admin = Admin::find($id);
        return view('profile.detail',compact('admin'));
    }
}
