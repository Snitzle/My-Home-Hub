<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\MortgageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    $properties = auth()->user()->properties;

    return view('dashboard', compact('properties'));

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('property',PropertyController::class );
    Route::resource('mortgage', MortgageController::class );
//    Route::resource('job', JobController::class );

    Route::get('/property/{property}/jobs', [ JobController::class, 'index' ] )->name('job.index');
    Route::get('/property/{property_id}/jobs/{job_id}', [ JobController::class, 'show' ] )->name('job.show');


});

require __DIR__.'/auth.php';
