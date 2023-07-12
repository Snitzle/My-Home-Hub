<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\MortgageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyJobCommentController;
use App\Http\Controllers\VehicleController;
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

    // These need to be changed to be pluralised
    Route::resources([
        'property' => PropertyController::class,
        'mortgage' => MortgageController::class,
        'property.job' => JobController::class,
        'property.job.comment' => PropertyJobCommentController::class,
        'vehicle' => VehicleController::class
    ]);

});

require __DIR__.'/auth.php';
