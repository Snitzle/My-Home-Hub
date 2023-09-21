<?php

use App\Models\Bin;
use App\Models\User;
use App\Models\Property;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/sanctum/token', function (Request $request) {

    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ], [
        'email.required' => 'Email is required',
        'email.email' => 'Email must be a valid email address',
        'password.required' => 'Password is required',
        'device_name.required' => 'Device name is required',
    ]);
 
    try {
        
        $user = User::where('email', $request->email)->firstOrFail();

    } catch ( Exception $e ) {

        abort( 401, 'The provided credentials are incorrect. User doesn\'t exist.');

    }

 
    if ( ! $user || ! Hash::check($request->password, $user->password)) {

        abort( 401, 'The provided credentials are incorrect. User doesn\'t exist or password is incorrect');

    }
 
    return $user->createToken( $request->device_name )->plainTextToken;

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/bins', function () {
    return Bin::all();
});

Route::get('Users/{user}/properties', function ( User $user ) {
    return $user->properties;
});

Route::get('/properties/{property}/bins', function ( Property $property ) {
    return $property->bins;
});

// Routes are stateless so need to get the data from the user and whats passed in the request
Route::middleware( [ 'auth:sanctum', 'verified' ] )->group(function () { 

    Route::get('/properties', function ( Request $request ) {

        return $request->user()->properties;

    });
    
    Route::get('/properties/{property}/bins', function ( Property $property ) {

        if ( $property->user_id !== auth()->user()->id ) {

            abort( 401 );

        }

        return $property->bins;
        
    });
    
    Route::get('/bins/{bin}', function ( Bin $bin ) {

        if ( $bin->property->user_id !== auth()->user()->id ) {
            abort( 401 );
        }

        return $bin;

    });

});
