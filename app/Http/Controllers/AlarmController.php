<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alarm;
use App\Models\Client;
use App\Models\Note;
use App\Models\Report;
use App\Models\User;
use App\Models\Section;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Rules\PasswordMatch;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AlarmController extends Controller
{
  //
  public function index()
  {
    $alarms = Alarm::all();

    if (auth()->user()->role == 1) {
      return view('admin/alarm', ['alarms' => $alarms]);
    } else if (auth()->user()->role == 2) {
      return view('account/alarm', ['alarms' => $alarms]);
    } else {
      return view('staff/alarm', ['alarms' => $alarms]);
    }
  }

  public function create_alarm()
  {
    $clients = Client::all();
    if (auth()->user()->role == 1) {
      return view('admin/alarm_create', ['clients' => $clients]);
    } else if (auth()->user()->role == 2) {
      return view('account/alarm_create', ['clients' => $clients]);
    } else {
      return view('staff/alarm_create', ['clients' => $clients]);
    }
  }

  public function delete_alarm($id)
  {
    $alarm = Alarm::find($id);
    $alarm->delete();
    return redirect()->back();
  }

  public function delete_section($id)
  {
    $alarm = Section::find($id);
    $alarm->delete();
    return redirect()->back();
  }

  public function store_alarm(Request $request)
  {
    $request->validate([
      'job_no' => 'required',
      'date' => 'required',
      'alarm_monitor_company' => 'required',
      'client_name' => 'required',
      'client_address' => 'required',
      'sector_activation' => 'required',
      'time_on_site' => 'required',
      'time_off_site' => 'required',
      'document_no' => 'required',
      'invoice_to' => 'required',
      'comment' => 'required',
      'security_officer_name' => 'required'
    ]);

    $alarm = new Alarm();
    $alarm->job_no = $request->job_no;
    $alarm->date = $request->date;
    $alarm->alarm_monitor_company = $request->alarm_monitor_company;
    $alarm->client_name = $request->client_name;
    $alarm->client_address = $request->client_address;
    $alarm->sector_activation = $request->sector_activation;
    $alarm->time_on_site = $request->time_on_site;
    $alarm->time_off_site = $request->time_off_site;
    $alarm->document_no = $request->document_no;
    $alarm->invoice_to = $request->invoice_to;
    $alarm->comment = $request->comment;
    $alarm->user_id = auth()->user()->id;
    $alarm->security_officer_name = $request->security_officer_name;
    $alarm->save();
    return redirect()->back();
  }

  public function store_search(Request $request)
  {

    $year = $request->year;
    $month = $request->month;
    $date = $year . '-' . $month;
    $alarms =  Alarm::all();
    return view('admin/alarm', ['alarms' => $alarms]);

    foreach ($date_a as $alarm) {
      /* print_r($alarm);
               die();*/
      //
      //echo $date_a['date'];
      if (strpos($alarm->date, $date) !== false) {

        echo '<tr>';
        echo '<td>' . $alarm->job_no . '</td>';
        echo '<td>' . $alarm->date . '</td>';
        echo '<td>' . $alarm->alarm_monitor_company . '</td>';
        echo '<td>' . $alarm->client_name . '</td>';
        echo '<td>' . $alarm->client_address . '</td>';
        echo '<td>' . $alarm->sector_activation . '</td>';
        echo '<td>' . $alarm->time_on_site . '</td>';
        echo '<td>' . $alarm->time_off_site . '</td>';
        echo '<td>' . $alarm->document_no . '</td>';
        echo '<td>' . $alarm->invoice_to . '</td>';
        echo '<td>' . $alarm->comment . '</td>';
        echo '<td>' . $alarm->security_officer_name . '</td>';
        echo '<td>';
        $path = route('delete_alarm', $alarm->id);
        echo '<a href="' . $path . '" class="btn btn-primary">Delete</a>';
        echo '</td>';
        echo '</tr>';
      }
    }
    /* print_r($alarms);
          die();*/
  }
}
