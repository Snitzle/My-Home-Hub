<?php

namespace App\Http\Controllers;

use App\Models\Boiler;
use App\Models\Job;
use App\Models\Property;
use Illuminate\Http\Request;

class BoilerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request, Property $property )
    {

        $boiler = Boiler::where('property_id', $property->id )->first();

        return view('property.boiler.index', compact('property', 'boiler' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( Request $request, Property $property )
    {
        return view( 'property.boiler.create', compact('property') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request, Property $property )
    {

        $active = 0;

        if ( $request->has('active')  ) {

            $active = 1;

            // Add in an option for buildings with more than boiler at a later date
            if ( !is_null( Boiler::where( 'active', 1 )->first() ) ) {
                return back()->withError('You have an active property already');
            }

        }

        $request->merge([ 'active' => $active ]);

        $validated = $request->validate([
            'property_id' => 'required',
            'make' => 'required|string',
            'type' => 'required|integer|max:1',
            'model' => 'string',
            'install_date' => 'date',
            'active' => 'required|boolean'
        ], [
            'make.string' => 'Make is required to be a string',
        ]);

        $boiler = Boiler::create( $validated );

        return response()->redirectToRoute('property.boiler.index', [ $property ] )->withSuccess('Boiler Added!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Boiler $boiler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Boiler $boiler)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Boiler $boiler)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Boiler $boiler)
    {
        //
    }
}
