<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\BinController;
use App\Http\Controllers\BoilerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MortgageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyBillController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyJobCommentController;
use App\Http\Controllers\RoomController;
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
    return view('homepage');
});

Route::get('/about', function () {
    return view('under-construction');
});

Route::get('/roadmap', function () {
    return view('under-construction');
});

Route::get('/blog', function () {
    return view('under-construction');
});

Route::get('/careers', function () {
    return view('under-construction');
});

Route::get('/docs', function () {
    return view('under-construction');
});

Route::get('/accessability', function () {
    return view('under-construction');
});

Route::get('/contact', function () {
    return view('under-construction');
});




Route::middleware(['auth', 'verified'] )->group(function () {

    Route::get('/dashboard', function () {

        return view('dashboard' );

    })->name('dashboard');

    Route::get('/reports', function () {

        return view('reports');

    })->name('reports');

    Route::get('/reminders', function () {

        return view('reminders');

    })->name('reminders');


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
        'property.boiler' => BoilerController::class,
        'property.bin' => BinController::class,
        'vehicle' => VehicleController::class,
        'property.room' => RoomController::class,
        // 'property.subscription' => SubscriptionController::class,
    ]);

    Route::post('/property/{property}/mortgage/{mortgage}/upload-property-survey', [ MortgageController::class, 'upload_property_survey' ])->name('property.mortgage.survey.upload');
    Route::post('/property/{property}/mortgage/{mortgage}/delete-property-survey', [ MortgageController::class, 'delete_property_survey' ])->name('property.mortgage.survey.delete');

    Route::post('/property/{property}/mortgage/{mortgage}/upload-mortgage-contract', [ MortgageController::class, 'upload_mortgage_contract' ])->name('property.mortgage.contract.upload');
    Route::post('/property/{property}/mortgage/{mortgage}/delete-mortgage-contract', [ MortgageController::class, 'delete_mortgage_contract' ])->name('property.mortgage.contract.delete');

    Route::get('/property/{property}/options', [ PropertyController::class, 'show_property_options' ])->name('property.options.show');
    Route::patch('/property/{property}/options', [ PropertyController::class, 'save_property_options' ])->name('property.options.update');

});

require __DIR__.'/auth.php';
