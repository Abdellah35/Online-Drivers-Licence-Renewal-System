<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RenewalFormController;
use App\Http\Controllers\FeedBackController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RenewalAppointmentController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\Auth\LogoutController;

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
    return view('home');
});

Route::get('/', function () {
    return view('home');
});

Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/logout-user-session', [LogoutController::class,'Logout']);


// Route::group(['middleware' => ['auth', 'verified']], function () {
    
//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
// });

Route::group([
    'prefix'=>'feedback',
], function(){
    Route::get('index',[FeedBackController::class,'index']);
    Route::post('store',[FeedBackController::class,'store']);
    Route::post('show',[FeedBackController::class,'show']);
    Route::post('delete',[FeedBackController::class,'destroy']);
});

Route::group([
    'prefix'=>'appointment',
], function(){
    Route::get('index',[RenewalFormController::class,'index']);
    Route::post('store',[RenewalFormController::class,'store']);
    Route::post('show',[RenewalFormController::class,'show']);
    Route::post('delete',[RenewalFormController::class,'destroy']);

});
//naty
Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::resource('dashboard', DashboardController::class,);
    Route::resource('appointment', RenewalAppointmentController::class,);
    Route::post('delete_request', [RenewalAppointmentController::class, 'destroy']);
    Route::get('new-request', [RenewalAppointmentController::class, 'newrequest']);
    Route::get('approved-request', [RenewalAppointmentController::class, 'approvedrequest']);
    Route::get('schedule_request', [ScheduleController::class, 'index']);

    Route::resource('schedule_request', ScheduleController::class);
});
