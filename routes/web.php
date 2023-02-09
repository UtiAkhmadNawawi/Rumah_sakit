<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DoctorController;
use \App\Http\Controllers\InpatientRecordController;
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

//route pasien
Route::resource('/patients', \App\Http\Controllers\PatientController::class);

//route dokter
Route::resource('/doctors', \App\Http\Controllers\DoctorController::class);

// route inpatient
Route::resource('/inpatient_records', \App\Http\Controllers\InpatientRecordController::class);
route::get('/inpatient_records/show-byid', '\App\Http\Controllers\InpatientRecordController@showbyid');
Route::get('/api/inpatient_records/{patient_id}/lama_inap', '\App\Http\Controllers\InpatientRecordController@getDuration');