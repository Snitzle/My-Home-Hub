<?php

namespace App\Http\Controllers;

use App\Models\Bin;
use App\Models\Property;
use Illuminate\Http\Request;

class BinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request, Property $property )
    {
        return view('property.bins.index', compact('property'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( Request $request, Property $property )
    {
        return view('property.bins.create', compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request, Property $property )
    {

        $request->merge([
            'property_id' => $request->input('property_id')
        ]);

        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'name' => 'required|string',
            'collection_day' => 'required|integer|max:6',
            'colour' => 'string',
            'collection_frequency' => 'required|integer|max:3',
            'last_collection_date' => 'date'
        ]);

        $bin = Bin::create( $validated );

        return response()->redirectToRoute('property.bin.index', $property->id )->withSuccess('Bin added to property!');

    }

    /**
     * Display the specified resource.
     */
    public function show( Request $request, Property $property, Bin $bin)
    {
        return view( 'property.bins.show', compact( 'property', 'bin') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Request $request, Property $property, Bin $bin)
    {
        return view('property.bins.edit', compact('property', 'bin' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property, Bin $bin)
    {
        $request->merge([
            'property_id' => $request->input('property_id')
        ]);

        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'name' => 'required|string',
            'collection_day' => 'required|integer|max:6',
            'colour' => 'string',
            'collection_frequency' => 'required|integer|max:3',
            'last_collection_date' => 'date'
        ]);

        $bin->update( $validated );

        return response()->redirectToRoute('property.bin.show', [ $property, $bin ] )->withSuccess('Bin Updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request, Property $property, Bin $bin)
    {

        // Make sure users own this comment before they can delete it
        if ( auth()->user()->id !== $property->user_id ) {
            return back()->withError('Unauthorized Deletion', 'This Comment does not belong to you');
        }

        $bin->delete();

        return response()
            ->redirectToRoute('property.bin.index', [ $property ])
            ->with('Success', 'Bin Deleted!');

    }
}
