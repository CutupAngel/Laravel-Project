<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Section;
use App\Models\Client;
use App\Models\Note;
use App\Models\Report;
use App\Models\Task;
use App\Models\Notification;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Rules\PasswordMatch;
use Illuminate\Support\Facades\Hash;


class DepartmentController extends Controller
{
  public function create_user(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'email|required|unique:users',
      'password' => 'required',
      'phone' => 'required'
    ]);



    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'role' =>  $request->role,
      'phone' => $request->phone,
      'password' => Hash::make($request->password)
    ]);

    $user->save();
  }
}
