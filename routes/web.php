<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AlarmController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DepartmentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return redirect('/login');
});

Auth::routes(['register' => false]);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {

  Route::get('/section/delete/{id}', [AlarmController::class, 'delete_section'])->name('delete_section');

  Route::group(['prefix' => 'alarm'], function () {
    Route::get('/', [AlarmController::class, 'index'])->name('alarm_system');
    Route::get('/create', [AlarmController::class, 'create_alarm'])->name('create_alarm');
    Route::post('/store', [AlarmController::class, 'store_alarm'])->name('store_alarm');
    Route::get('/delete/{id}', [AlarmController::class, 'delete_alarm'])->name('delete_alarm');
    Route::get('/store_search', [AlarmController::class, 'store_search'])->name('store_search');
  });

  Route::group(['prefix' => 'profile'], function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile_edit');
    Route::post('/update', [ProfileController::class, 'update'])->name('profile_update');
  });

  Route::group(['prefix' => 'message'], function () {
    Route::get('/', function () {
      return redirect('/inbox');
    });
    Route::get('/inbox', [MessageController::class, 'index'])->name('message_inbox');
    Route::post('/send', [MessageController::class, 'send'])->name('message_send');
    Route::get('/sent', [MessageController::class, 'sent'])->name('message_sent');
    Route::get('/inbox_destroy/{id}', [MessageController::class, 'inbox_destroy'])->name('inbox_destroy');
    Route::get('/sent_destroy/{id}', [MessageController::class, 'sent_destroy'])->name('sent_destroy');
    Route::get('/show/{id}', [MessageController::class, 'show'])->name('message_show');
    Route::get('/notification/{id}', [MessageController::class, 'delete'])->name('notification');
  });



  Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
      return redirect('/dashbord');
    });
    Route::get('/dashbord', [AdminController::class, 'index'])->name('admin')->middleware('admin-only');
    Route::get('/account', [AdminController::class, 'account'])->name('admin_account')->middleware('admin-only');
    Route::get('/account/create', [AdminController::class, 'account_create'])->name('admin_account_create')->middleware('admin-only');
    Route::post('/account/store', [AdminController::class, 'account_store'])->name('admin_account_store')->middleware('admin-only');
    Route::get('/account/edit/{id}', [AdminController::class, 'account_edit'])->name('admin_account_edit')->middleware('admin-only');
    Route::post('/account/update/{id}', [AdminController::class, 'account_update'])->name('admin_account_update')->middleware('admin-only');
    Route::get('/delete/{id}', [AdminController::class, 'account_delete'])->name('admin_account_delete')->middleware('admin-only');

    Route::get('/client', [AdminController::class, 'client'])->name('admin_client')->middleware('admin-only');
    Route::get('/client/create', [AdminController::class, 'client_create'])->name('admin_client_create')->middleware('admin-only');
    Route::post('/client/store', [AdminController::class, 'client_store'])->name('admin_client_store')->middleware('admin-only');
    Route::get('/client/{id}', [AdminController::class, 'client_show'])->name('admin_client_show')->middleware('admin-only');
    Route::get('/client/edit/{id}', [AdminController::class, 'client_edit'])->name('admin_client_edit')->middleware('admin-only');
    Route::post('/client/update/{id}', [AdminController::class, 'client_update'])->name('admin_client_update')->middleware('admin-only');
    Route::get('/client/destroy/{id}', [AdminController::class, 'client_destroy'])->name('admin_client_delete')->middleware('admin-only');

    Route::post('/task/create', [AdminController::class, 'task_create'])->name('admin_task_client')->middleware('admin-only');
    Route::get('/task/complete/{id}', [AdminController::class, 'task_complete'])->name('admin_task_complete')->middleware('admin-only');

    Route::get('/patrol', [AdminController::class, 'patrol'])->name('admin_patrol')->middleware('admin-only');
    Route::get('/patrol/checkin', [AdminController::class, 'checkin'])->name('checkin')->middleware('admin-only');
    Route::get('/patrol/checkout', [AdminController::class, 'checkout'])->name('checkout')->middleware('admin-only');
    Route::post('/patrol/add', [AdminController::class, 'add_patrol'])->name('admin_add_patrol')->middleware('admin-only');
    Route::post('/patrol/report', [AdminController::class, 'add_patrol_report'])->name('admin_add_patrol_report')->middleware('admin-only');
    Route::get('/patrol/report_delete/{id}', [AdminController::class, 'delete_pat_report'])->name('admin_delete_pat_report')->middleware('admin-only');
    Route::post('/patrol/delete', [AdminController::class, 'delete_patrol'])->name('delete_patrol')->middleware('admin-only');

    Route::get('/report', [AdminController::class, 'report'])->name('admin_report')->middleware('admin-only');
    Route::post('/report/add', [AdminController::class, 'add_report'])->name('admin_add_report')->middleware('admin-only');
    Route::get('/report/delete/{id}', [AdminController::class, 'delete_report'])->name('admin_delete_report')->middleware('admin-only');


    Route::post('/note/add', [AdminController::class, 'add_note'])->name('admin_add_note')->middleware('admin-only');
    Route::get('/note/delete/{id}', [AdminController::class, 'delete_note'])->name('admin_delete_note')->middleware('admin-only');

    Route::get('/change', [AdminController::class, 'change'])->name('change_admin')->middleware('admin-only');
    Route::get('/change_password', [AdminController::class, 'change_password'])->name('change_admin_password')->middleware('admin-only');
  });


  Route::group(['prefix' => 'department'], function () {
    Route::get('/', function () {
      return redirect('/dashbord');
    });
    Route::get('/dashbord', [DepartmentController::class, 'index'])->name('department')->middleware('department-only');
    Route::get('/account', [DepartmentController::class, 'account'])->name('department_account')->middleware('department-only');
    Route::get('/account/create', [DepartmentController::class, 'account_create'])->name('department_account_create')->middleware('department-only');
    Route::post('/account/store', [DepartmentController::class, 'account_store'])->name('department_account_store')->middleware('department-only');
    Route::get('/account/edit/{id}', [DepartmentController::class, 'account_edit'])->name('department_account_edit')->middleware('department-only');
    Route::post('/account/update/{id}', [DepartmentController::class, 'account_update'])->name('department_account_update')->middleware('department-only');
    Route::get('/delete/{id}', [DepartmentController::class, 'account_delete'])->name('department_account_delete')->middleware('department-only');

    Route::get('/client', [DepartmentController::class, 'client'])->name('department_client')->middleware('department-only');
    Route::get('/client/create', [DepartmentController::class, 'client_create'])->name('department_client_create')->middleware('department-only');
    Route::post('/client/store', [DepartmentController::class, 'client_store'])->name('department_client_store')->middleware('department-only');
    Route::get('/client/{id}', [DepartmentController::class, 'client_show'])->name('department_client_show')->middleware('department-only');
    Route::get('/client/edit/{id}', [DepartmentController::class, 'client_edit'])->name('department_client_edit')->middleware('department-only');
    Route::post('/client/update/{id}', [DepartmentController::class, 'client_update'])->name('department_client_update')->middleware('department-only');
    Route::get('/client/destroy/{id}', [DepartmentController::class, 'client_destroy'])->name('department_client_delete')->middleware('department-only');

    Route::post('/task/create', [DepartmentController::class, 'task_create'])->name('department_task_client')->middleware('department-only');
    Route::get('/task/complete/{id}', [DepartmentController::class, 'task_complete'])->name('department_task_complete')->middleware('department-only');

    Route::get('/report', [DepartmentController::class, 'report'])->name('department_report')->middleware('department-only');
    Route::post('/report/add', [DepartmentController::class, 'add_report'])->name('department_add_report')->middleware('department-only');
    Route::get('/report/delete/{id}', [DepartmentController::class, 'delete_report'])->name('department_delete_report')->middleware('department-only');

    Route::post('/note/add', [DepartmentController::class, 'add_note'])->name('department_add_note')->middleware('department-only');
    Route::get('/note/delete/{id}', [DepartmentController::class, 'delete_note'])->name('department_delete_note')->middleware('department-only');

    Route::get('/change', [DepartmentController::class, 'change'])->name('change_department')->middleware('department-only');
    Route::get('/change_password', [DepartmentController::class, 'change_password'])->name('change_department_password')->middleware('department-only');
  });

  Route::group(['prefix' => 'account'], function () {
    Route::get('/', function () {
      return redirect('/dashbord');
    });

    Route::get('/dashbord', [AccountController::class, 'index'])->name('account')->middleware('account-only');
    Route::get('/user', [AccountController::class, 'user'])->name('account_user')->middleware('account-only');
    Route::get('/user/create', [AccountController::class, 'user_create'])->name('account_user_create')->middleware('account-only');
    Route::post('/user/store', [AccountController::class, 'user_store'])->name('account_user_store')->middleware('account-only');
    Route::get('/user/edit/{id}', [AccountController::class, 'user_edit'])->name('account_user_edit')->middleware('account-only');
    Route::post('/user/update/{id}', [AccountController::class, 'user_update'])->name('account_user_update')->middleware('account-only');
    Route::get('/user/destroy/{id}', [AccountController::class, 'user_destroy'])->name('account_user_delete')->middleware('account-only');

    Route::get('/client', [AccountController::class, 'client'])->name('account_client')->middleware('account-only');
    Route::get('/client/create', [AccountController::class, 'client_create'])->name('account_client_create')->middleware('account-only');
    Route::post('/client/store', [AccountController::class, 'client_store'])->name('account_client_store')->middleware('account-only');
    Route::get('/client/{id}', [AccountController::class, 'client_show'])->name('account_client_show')->middleware('account-only');
    Route::get('/client/edit/{id}', [AccountController::class, 'client_edit'])->name('account_client_edit')->middleware('account-only');
    Route::post('/client/update/{id}', [AccountController::class, 'client_update'])->name('account_client_update')->middleware('account-only');
    Route::get('/client/destroy/{id}', [AccountController::class, 'client_destroy'])->name('account_client_delete')->middleware('account-only');

    Route::post('/note/add', [AccountController::class, 'add_note'])->name('add_note')->middleware('account-only');
    Route::get('/note/delete/{id}', [AccountController::class, 'delete_note'])->name('delete_note')->middleware('account-only');

    Route::post('/task/create', [AccountController::class, 'task_create'])->name('account_task_client')->middleware('account-only');
    Route::get('/task/complete/{id}', [AccountController::class, 'task_complete'])->name('account_task_complete')->middleware('account-only');

    Route::get('/report', [AdminController::class, 'report'])->name('account_report')->middleware('account-only');
    Route::post('/report/add', [AccountController::class, 'add_report'])->name('add_report')->middleware('account-only');
    Route::get('/report/delete/{id}', [AccountController::class, 'delete_report'])->name('delete_report')->middleware('account-only');

    Route::get('/change', [AccountController::class, 'change'])->name('change_account')->middleware('account-only');
    Route::get('/change_password', [AccountController::class, 'change_password'])->name('account_change_password')->middleware('account-only');
  });
  Route::group(['prefix' => 'client'], function () {
    Route::get('/', [ClientController::class, 'index'])->name('client')->middleware('client-only');
    Route::get('/change', [ClientController::class, 'change'])->name('change_client')->middleware('client-only');
    Route::post('/change_password', [ClientController::class, 'change_password'])->name('change_client_password')->middleware('client-only');
  });
  Route::group(['prefix' => 'staff'], function () {
    Route::get('/', function () {
      return redirect('/report');
    });
    Route::get('/report', [StaffController::class, 'report'])->name('staff_report')->middleware('user-only');
    //Route::get('/report', [AccountController::class,'report'])->name('report')->middleware('user-only');
    Route::get('/patrol', [StaffController::class, 'patrol'])->name('staff_patrol')->middleware('user-only');
  });
});
