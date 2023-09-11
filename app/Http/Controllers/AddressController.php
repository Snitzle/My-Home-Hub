<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Country;
use App\Models\Property;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Property $property, Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Property $property )
    {

        $countries = Country::all(['id', 'name', 'alpha_2']);

        return view('property.address.edit', compact('property', 'countries') );

    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Property $property, Address $address )
    {

        $validated = $request->validate([
            'alias' => 'string',
            'company' => 'string',
            'address_1' => 'string',
            'address_2' => 'nullable|string',
            'address_3' => 'nullable|string',
            'town' => 'string',
            'county' => 'nullable|string',
            'postcode' => 'string',
            'country' => 'string',
        ]);

        $address->update( $validated );

        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        //
    }
}
