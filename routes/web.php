<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\RegistrationController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/branches', function () {
    return view('calender');
});
Route::get('/branches', function () {
    return view('data');
});
//branches
Route::get('/branches', [BranchController::class, 'index'])->name('branches.index');
Route::post('/branches', [BranchController::class, 'store'])->name('branches.store');
Route::put('/branches/{branch}', [BranchController::class, 'update'])->name('branches.update');
Route::get('/branches/{branch}', [BranchController::class, 'destroy'])->name('branches.destroy');
//doctors
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
Route::post('/doctors', [DoctorController::class, 'store'])->name('doctors.store');
Route::put('/doctors/{id}', [DoctorController::class, 'update'])->name('doctors.update');
Route::get('/doctors/{id}', [DoctorController::class, 'destroy'])->name('doctors.destroy');
// Define routes for services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
// Index - Display all appointments
Route::get('/appointments', [AppointmentsController::class, 'index'])->name('appointments.index');
Route::get('/appointments/show', [AppointmentsController::class, 'show'])->name('appointments.show');
Route::post('/appointments', [AppointmentsController::class, 'store'])->name('appointments.store');
Route::put('/appointments/{id}', [AppointmentsController::class, 'update'])->name('appointments.update');
Route::get('/appointments/{id}', [AppointmentsController::class, 'destroy'])->name('appointments.destroy');
//register
Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
Route::get('/registrations/{id}', [RegistrationController::class, 'getRegistrationData'])->name('registrations.getRegistrationData');
Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store');
Route::put('/registrations/{id}', [RegistrationController::class, 'update'])->name('registrations.update');
Route::delete('/registrations/{id}', [RegistrationController::class, 'destroy'])->name('registrations.destroy');
