<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MortgageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyBillController;
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

Route::middleware(['auth', 'verified'] )->group(function () {

    Route::get('/dashboard', function () {

        return view('dashboard' );

    })->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // These need to be changed to be pluralised
    Route::resources([
        'property' => PropertyController::class,
        'property.mortgage' => MortgageController::class,
        'property.address' => AddressController::class,
        'property.bill' => PropertyBillController::class,
        'property.job' => JobController::class,
        'property.job.comment' => PropertyJobCommentController::class,
        'vehicle' => VehicleController::class
    ]);

    Route::post('/property/{property}/mortgage/{mortgage}/upload-property-survey', [ MortgageController::class, 'upload_property_survey' ])->name('property.mortgage.survey.upload');
    Route::post('/property/{property}/mortgage/{mortgage}/delete-property-survey', [ MortgageController::class, 'delete_property_survey' ])->name('property.mortgage.survey.delete');

    Route::post('/property/{property}/mortgage/{mortgage}/upload-mortgage-contract', [ MortgageController::class, 'upload_mortgage_contract' ])->name('property.mortgage.contract.upload');
    Route::post('/property/{property}/mortgage/{mortgage}/delete-mortgage-contract', [ MortgageController::class, 'delete_mortgage_contract' ])->name('property.mortgage.contract.delete');

});

require __DIR__.'/auth.php';
