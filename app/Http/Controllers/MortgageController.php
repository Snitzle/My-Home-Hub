<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMortgageRequest;
use App\Models\Mortgage;
use App\Models\Property;
use App\Models\PropertyMortgageRateType;
use Illuminate\Http\Request;

class MortgageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( Property $property )
    {
        $mortgage_types = PropertyMortgageRateType::all();

        return view('property.mortgage.create', compact('property', 'mortgage_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( StoreMortgageRequest $request, Property $property )
    {

        $validated = $request->validated();

        $mortgage = Mortgage::create( $validated );

        $mortgage::update(['property_id' => $property->id ]);

        return response()->redirectToRoute('property.show', $property );

    }

    /**
     * Display the specified resource.
     */
    public function show(Mortgage $mortgage)
    {
        return view('');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mortgage $mortgage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mortgage $mortgage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mortgage $mortgage)
    {
        //
    }
}
