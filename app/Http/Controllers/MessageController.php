<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
  //
  public function index()
  {

    $messages = Message::where('id_to', auth()->user()->id)
      ->where('status_to', 1)
      ->orderBy("created_at", 'desc')
      ->get();
    if (auth()->user()->role == 1) {
      $users = User::all();
      return view('admin/message', ['messages' => $messages, 'users' => $users]);
    } else if (auth()->user()->role == 2) {
      $users = User::all();
      return view('account/message', ['messages' => $messages, 'users' => $users]);
    } else if (auth()->user()->role == 4) {
      $users = User::where('role', '<>', '3')->get();
      return view('staff/message', ['messages' => $messages, 'users' => $users]);
    } else if (auth()->user()->role == 5) {
      $users = User::all();
      return view('staff/message', ['messages' => $messages, 'users' => $users]);
    } else {
      $users = User::where('role', '<>', '3')->get();
      return view('client/message', ['messages' => $messages, 'users' => $users]);
    }
  }

  public function sent()
  {
    $users = User::where('role', '<>', '3')->get();
    $messages = Message::where('id_from', auth()->user()->id)
      ->where('status_from', 1)
      ->orderBy("created_at", 'desc')
      ->get();
    if (auth()->user()->role == 1) {
      return view('admin/message_sent', ['messages' => $messages, 'users' => $users]);
    } else if (auth()->user()->role == 2) {
      return view('account/message_sent', ['messages' => $messages, 'users' => $users]);
    } else {
      return view('staff/message_sent', ['messages' => $messages, 'users' => $users]);
    }
    // inbox messages

  }

  public function send(Request $request)
  {
    $request->validate([
      'subject' => 'required',
      'content' => 'required',
      'id' => 'required'

    ]);
    $message = new Message();
    $message->subject = $request->subject;
    $message->content = $request->content;
    $message->id_from = auth()->user()->id;
    $message->id_to = $request->id;
    $message->status_to = 1;
    $message->status_from = 1;
    $message->save();

    $notification = new Notification();
    $notification->user_id = $request->id;
    $notification->type = 1;
    $notification->status = 0;
    $notification->content = "You have a new message.";
    $notification->save();

    return redirect()->route('message_sent');
  }



  public function inbox_destroy($id)
  {
    $message = Message::find($id);
    $message->status_to = 2;
    $message->save();
    return redirect()->back();
  }

  public function sent_destroy($id)
  {
    $message = Message::find($id);
    $message->status_from = 2;
    $message->save();
    return redirect()->back();
  }

  public function show($id)
  {
    $messages = DB::select('select messages.*, (select name from users where users.id = messages.id_from) as from_name ,(select name from users where users.id = messages.id_to) as to_name from messages where id=' . $id);
    if (auth()->user()->role == 1) {
      return view('admin/message_show', ['messages' => $messages]);
    } else if (auth()->user()->role == 2) {
      return view('account/message_show', ['messages' => $messages]);
    } else {
      return view('staff/message_show', ['messages' => $messages]);
    }
  }

  public function delete($id)
  {
    $notification = Notification::find($id);

    $type = $notification->type;
    //$notification->status = 1;
    $notification->delete();
    $role = auth()->user()->role;
    if ($role == 1) {
      if ($type == 0) {
        return redirect()->route('admin');
      } else {
        return redirect()->route('message_inbox');
      }
    } else if ($role == 0) {
      if ($type == 1) {
        return redirect()->route('account');
      } else {
        return redirect()->route('message_inbox');
      }
    } else if ($role == 4) {
      if ($type == 0) {
        return redirect()->route('staff_report');
      } else {
        return redirect()->route('message_inbox');
      }
    } else if ($role == 5) {
      if ($type == 0) {
        return redirect()->route('department');
      } else {
        return redirect()->route('message_inbox');
      }
    } else {
      if ($type == 0) {
        return redirect()->route('client');
      } else {
        return redirect()->route('message_inbox');
      }
    }
  }
}
