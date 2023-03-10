<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Clinic\QueueController;
use App\Http\Controllers\Clinic\DoctorController;
use App\Http\Controllers\Clinic\ReceptionController;
use App\Http\Controllers\Clinic\LabController;
use App\Http\Controllers\Clinic\LabQueueController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});




//student list routes

Route::middleware('auth')->group(function () {
    Route::get('clinic/reception', [ReceptionController::class, 'index']);
    Route::get('clinic/reception/{student}', [ReceptionController::class, 'show']);
});


// //Doctor
// Route::group(['prefix' => 'clinic', 'as' => 'doctor.', 'middleware' => ['auth', 'doctor']], function () {
// Route::middleware('auth')->group(['prefix' => 'clinic'], function () {
Route::middleware('auth')->group(function () {
    Route::get('clinic/doctor', [DoctorController::class, 'index']);
    Route::post('clinic/detail/record/lab/{student}', [DoctorController::class, 'storeLabReports']);
    Route::post('clinic/detail/record/med/{student}',  [DoctorController::class, 'storeMedRecord']);
    Route::post('clinic/detail/record/personal/{student}',  [DoctorController::class, 'storePersonalRecord']);
    Route::get('clinic/detail/{student}',  [DoctorController::class, 'show']);
    Route::delete('clinic/detail/{student}',  [DoctorController::class, 'delete']);
});
// Route::group(['prefix' => 'clinic', 'as' => 'lab.', 'middleware' => ['auth', 'lab']], function () {
// Route::middleware('auth')->group(['prefix' => 'clinic'], function () {
Route::middleware('auth')->group(function () {
    Route::get('clinic/lab', [LabController::class, 'index']);
    Route::get('clinic/lab/detail/{student}', [LabController::class, 'show']);
    Route::post('clinic/lab/detail/{student}', [LabController::class, 'storeLabResultss']);
});

Route::middleware('auth')->group(function () {
    Route::get('clinic/queue', [QueueController::class, 'index']);
    Route::get('clinic/labqueue', [LabqueuesController::class, 'index']);
});
