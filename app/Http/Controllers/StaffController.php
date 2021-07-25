<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

class StaffController extends Controller
{
  //

  public function report()
  {
    $reports = DB::table('reports')
      ->join('clients', 'clients.id', 'reports.client_id')
      ->select('reports.*', 'clients.name as user_name', 'clients.id as client_id')
      ->get();
    $report1 = DB::table('partol_reports')
      ->join('users', 'users.id', 'partol_reports.user_id')
      ->select('partol_reports.*', 'users.name as user_name', 'users.id as client_id')
      ->get();
    return view('staff/report', ['reports' => $reports, 'report2' => $report1]);
  }

  public function patrol()
  {
    $client_id = DB::table('clients')
      ->where('user_id', auth()->user()->id)
      ->value('id');
    $patrols = DB::table('patrols')
      // ->join('clients', 'clients.id', 'patrols.userid')
      ->select('patrols.*')
      ->where('patrols.userid', $client_id)
      ->get();
    $clients = DB::table('clients')
      ->where('user_id', auth()->user()->id)
      ->value('name');
    return view('staff/patrol', ['patrols' => $patrols, 'name' => $clients, 'id'=>auth()->user()->id]);
  }
}
