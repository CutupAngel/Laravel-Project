<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
  //
  public function index()
  {
    $user = User::find(auth()->user()->id);
    if (auth()->user()->role == 1) {
      return view('admin/profile', ['user' => $user]);
    } else if (auth()->user()->role == 2) {
      return view('account/profile', ['user' => $user]);
    } else {
      return view('staff/profile', ['user' => $user]);
    }
  }

  public function edit()
  {
    $user = User::find(auth()->user()->id);
    if (auth()->user()->role == 1) {
      return view('admin/profile_edit', ['user' => $user]);
    } else if (auth()->user()->role == 2) {
      return view('account/profile_edit', ['user' => $user]);
    } else {
      return view('staff/profile_edit', ['user' => $user]);
    }
  }

  public function update(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'unique:users,email,' . auth()->user()->id . '|email|required',
      'password' => 'required',
      'phone' => 'required'
    ]);

    $avatarPath = null;
    if ($request->avatar != null) {
      $avatarName = uniqid() . '.' . $request->avatar->extension();
      $avatarPath = 'assets/profile/' . $avatarName;
      $request->avatar->move(public_path('assets/profile'), $avatarName);
    }

    $user = User::find(auth()->user()->id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->avatar = $avatarPath;
    $user->password = Hash::make($request->password);
    $user->save();
    return redirect()->route('profile');
  }
}
