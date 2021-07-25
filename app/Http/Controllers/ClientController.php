<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Rules\PasswordMatch;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
  //
  public function index()
  {
    $user = User::find(auth()->user()->id);
    $client = Client::where('user_id', $user->id)->first();
    $reports = Report::where('client_id', $client->id)->get();
    return view('client/index', ['client' => $client, 'reports' => $reports]);
  }

  public function change()
  {
    return view('client/change');
  }

  public function change_password(Request $request)
  {

    $validation = Validator::make($request->all(), [
      'current_password' => ['required', new PasswordMatch],
      'new_password' => ['required'],
      'new_confirm_password' => ['same:new_password'],
    ]);

    if ($validation->fails()) {
      // The given data did not pass validation
      return redirect()->back()->withErrors($validation->errors());
    }

    User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
    return redirect()->route('client');
  }
}
