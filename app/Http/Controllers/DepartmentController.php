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
  //
  public function index()
  {
    $sections = Section::orderBy('created_at', 'DESC')->get();
    $tasks = DB::table('tasks')
      ->where('tasks.status', 'InComplete')
      ->join('users', 'users.id', 'tasks.user_id')
      ->select('tasks.*', 'users.name')
      ->get();
    $notes = Note::all();
    $users = User::where('role', '<>', '3')->get();
    $reports = Report::all();
    $clients = Client::all();
    return view('department/index', ['sections' => $sections, 'tasks' => $tasks, 'notes' => $notes, 'users' => $users, 'reports' => $reports, 'clients' => $clients]);
  }

  public function account()
  {
    $users = User::where('role', '<>', '3')->get();
    return view('department/account', ['users' => $users]);
  }

  public function account_create()
  {
    return view('department/account_create');
  }

  public function account_store(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'email|required|unique:users',
      'password' => 'required',
      'phone' => 'required'
    ]);

    $avatarPath = null;
    if ($request->avatar != null) {
      $avatarName = uniqid() . '.' . $request->avatar->extension();
      $avatarPath = 'assets/profile/' . $avatarName;
      $request->avatar->move(public_path('assets/profile'), $avatarName);
    }

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'role' =>  $request->role,
      'phone' => $request->phone,
      'avatar' => $avatarPath,
      'password' => Hash::make($request->password)
    ]);

    $user->save();

    return redirect()->route('admin_account')->with('success', 'Account created successfully.');
  }

  public function account_show($id)
  {
  }

  public function account_edit($id)
  {
    $user = User::find($id);
    return view('department/account_edit', ['user' => $user]);
  }

  public function account_update(Request $request, $id)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'unique:users,email,' . $id . '|email|required',
      'password' => 'required',
      'phone' => 'required'
    ]);

    $avatarPath = null;
    if ($request->avatar != null) {
      $avatarName = uniqid() . '.' . $request->avatar->extension();
      $avatarPath = 'assets/profile/' . $avatarName;
      $request->avatar->move(public_path('assets/profile'), $avatarName);
    }

    $user = User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    if ($avatarPath == null) {
      $avatarPath = $user->avatar;
    }
    $user->avatar = $avatarPath;
    $user->password = Hash::make($request->password);
    $user->save();
    return redirect()->route('admin_account')->with('success', 'Account updated successfully.');
  }

  public function account_delete($id)
  {
    $user = User::find($id);
    $user->delete();
    return redirect()->route('admin_account')->with('success', 'Account deleted successfully');
  }



  public function client()
  {
    $clients = Client::all();
    return view('department/client', ['clients' => $clients]);
  }

  public function client_create()
  {
    return view('department/client_create');
  }

  public function client_store(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'email|required|unique:users',
      'phone' => 'required',
      'password' => 'required',

      'patrol' => 'required',
      'days' => 'required',
      'lock_up' => 'required',
      'contract_length' => 'required',
      'site_name' => 'required',
      'call_out' => 'required',

      'payment' => 'required',
      'payment_term' => 'required',
      'invoice_period' => 'required',
    ]);

    $avatarPath = null;
    if ($request->avatar != null) {
      $avatarName = uniqid() . '.' . $request->avatar->extension();
      $avatarPath = 'assets/profile/' . $avatarName;
      $request->avatar->move(public_path('assets/profile'), $avatarName);
    }

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'role' => '3',
      'phone' => $request->phone,
      'avatar' => $request->avatarPath,
      'password' => Hash::make($request->password)
    ]);
    $user->save();

    $client = new Client();
    $client->user_id = $user->id;
    $client->name = $request->name;
    $client->email = $request->email;
    $client->phone = $request->phone;

    $client->patrol = $request->patrol;
    $client->site_name = $request->site_name;
    $client->contract_length = $request->contract_length;
    $client->days = $request->days;
    $client->lock_up = $request->lock_up;
    $client->call_out = $request->call_out;

    $client->payment_term = $request->payment_term;
    $client->invoice_period = $request->invoice_period;
    $client->payment = $request->payment;
    $client->avatar = $avatarPath;
    $client->save();

    $section = new Section();
    $content = auth()->user()->name . ' created new client(name : ' . $client->name . ', email : ' . $client->email . ')';
    $section->content = $content;
    $section->save();

    return redirect()->route('admin_client')->with('success', 'Client created successfully.');
  }

  public function client_show($id)
  {
    $client = Client::find($id);
    $user = User::find($client->user_id);
    $notes = Note::where('client_id', $id)->get();
    $reports = Report::where('client_id', $id)->get();
    return view('department/client_show', ['client' => $client, 'user' => $user, 'notes' => $notes, 'reports' => $reports]);
  }

  public function client_edit($id)
  {
    $client = Client::find($id);
    $user = User::find($client->user_id);
    return view('department/client_edit', ['client' => $client, 'user' => $user]);
  }

  public function client_update(Request $request, $id)
  {
    $client = Client::find($id);
    $request->validate([
      'name' => 'required',
      'email' => 'unique:users,email,' . $client->user_id . '|email|required',
      'phone' => 'required',
      'password' => 'required',

      'patrol' => 'required',
      'days' => 'required',
      'lock_up' => 'required',
      'contract_length' => 'required',
      'site_name' => 'required',
      'call_out' => 'required',

      'payment' => 'required',
      'payment_term' => 'required',
      'invoice_period' => 'required',
    ]);

    $avatarPath = null;
    if ($request->avatar != null) {
      $avatarName = uniqid() . '.' . $request->avatar->extension();
      $avatarPath = 'assets/profile/' . $avatarName;
      $request->avatar->move(public_path('assets/profile'), $avatarName);
    }

    $image = $client->avatar;
    if ($image != null) {
      File::delete(public_path($image));
    }
    $user = User::find($client->user_id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    if ($avatarPath == null) {
      $avatarPath = $user->avatar;
    }
    $user->avatar = $avatarPath;
    $user->password = Hash::make($request->password);
    $user->save();

    $client->user_id = $user->id;
    $client->name = $request->name;
    $client->email = $request->email;
    $client->phone = $request->phone;

    $client->patrol = $request->patrol;
    $client->site_name = $request->site_name;
    $client->contract_length = $request->contract_length;
    $client->days = $request->days;
    $client->lock_up = $request->lock_up;
    $client->call_out = $request->call_out;

    $client->payment_term = $request->payment_term;
    $client->invoice_period = $request->invoice_period;
    $client->payment = $request->payment;
    $client->avatar = $avatarPath;
    $client->save();


    $section = new Section();
    $content = auth()->user()->name . ' updated  client(name : ' . $client->name . ', email : ' . $client->email . ')';
    $section->content = $content;
    $section->save();


    return redirect()->route('admin_client')
      ->with('success', 'Client updated successfully');
  }

  public function client_destroy($id)
  {
    $client = Client::find($id);

    $section = new Section();
    $content = auth()->user()->name . ' deleted  client(name : ' . $client->name . ', email : ' . $client->email . ')';
    $section->content = $content;
    $section->save();


    $client->delete();

    // redirect
    //Session::flash('message', 'Successfully deleted the shark!');
    return redirect()->route('admin_client')
      ->with('success', 'Client deleted successfully');
  }


  public function add_note(Request $request)
  {
    $note = new Note();
    $note->client_id = $request->id;
    $note->content = $request->content;
    $note->save();
    $client = Client::find($request->id);
    $section = new Section();
    $content = auth()->user()->name . ' added the note of  user(name : ' . $client->name . ', email : ' . $client->email . ')';
    $section->content = $content;
    $section->save();

    return redirect()->route('admin_client_show', $request->id);
  }

  public function delete_note($id)
  {
    $note = Note::find($id);
    $note->delete();
    return redirect()->back();
  }

  public function report()
  {
    $reports = DB::table('reports')
      ->join('clients', 'clients.id', 'reports.client_id')
      ->select('reports.*', 'clients.name as user_name', 'clients.id as client_id')
      ->get();
    return view('department/report', ['reports' => $reports]);
  }

  public function add_report(Request $request)
  {
    $report = new Report();

    $pdfPath = null;
    if ($request->pdf != null) {
      $pdfName = uniqid() . '.' . $request->pdf->extension();
      $pdfPath = 'assets/report/' . $pdfName;
      $request->pdf->move(public_path('assets/report'), $pdfName);
    }
    $report->client_id = $request->id;
    $report->title = $request->title;
    $report->path = $pdfPath;
    $report->save();

    $client = Client::find($request->id);
    $section = new Section();
    $content = auth()->user()->name . ' added the report of  user(name : ' . $client->name . ', email : ' . $client->email . ')';
    $section->content = $content;
    $section->save();

    return redirect()->route('admin_client_show', $request->id);
  }

  public function delete_report($id)
  {
    $report = Report::find($id);
    $report->delete();
    return redirect()->back();
  }

  public function task_create(Request $request)
  {
    $task = new Task();
    $task->content = $request->content;
    $task->status = "InComplete";
    $task->user_id = $request->user_id;
    $task->save();

    $user = User::find($request->user_id);

    $section = new Section();
    $content = auth()->user()->name . ' add  client(name : ' . $user->name . ', email : ' . $user->email . ')';
    $section->content = $content;
    $section->save();

    $notification = new Notification();
    $notification->user_id = $request->user_id;
    $notification->content = "You have been assigned a task.";
    $notification->save();

    return redirect()->back();
  }

  public function task_complete($id)
  {
    $task = Task::find($id);
    $task->status = "Complete";
    $task->save();
    return redirect()->back();
  }

  public function change()
  {
  }

  public function change_password()
  {
  }
}
