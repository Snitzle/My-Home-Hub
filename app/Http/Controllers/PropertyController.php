<?php

namespace App\Http\Controllers;

use App\Models\Boiler;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Property $property )
    {
        return view('property.index', compact('property') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {

        $total_bill_cost = 0;

        foreach ( $property->bills as $bill ) {

            $total_bill_cost += $bill->price;

        }

        $boiler = Boiler::where('property_id', $property->id )->first();

        return view('property.show', compact( 'property', 'total_bill_cost', 'boiler' ) );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        $property_types = PropertyType::all();

        return view('property.edit', compact('property', 'property_types') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {

        if ( $request->has('price') ) {

            // Make this a helper function
            $price = str_replace(['£', ','], ['', ''], $request->input('price') );

            // Convert to pennies
            $price = intval( $price * 100 );

            $request->merge([
                'price' => $price
            ]);

        }

        $validated = $request->validate([
            'name' => 'string',
            'purchase_date' => 'date',
            'move_in_date' => 'date',
            'price' => 'integer',
            'year_built' => 'date_format:Y'
        ],[
            'price.integer' => 'Price must be a whole number. Please input price without the currency symbol, commas or full stops'
        ]);

        $property->update( $validated );

        return back()->withSuccess('Property Information Updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
    }

    public function show_property_options ( Request $request, Property $property ) {

        return view('property.options.show', compact('property'));

    }

    public function save_property_options ( Request $request, Property $property ) {

    }

}
