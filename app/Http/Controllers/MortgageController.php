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

        return response()->redirectToRoute('property.show', $property );

    }

    /**
     * Display the specified resource.
     */
    public function show( Property $property, Mortgage $mortgage)
    {

        $mortgage_types = PropertyMortgageRateType::all();

        return view('property.mortgage.show', compact('property', 'mortgage', 'mortgage_types' ));

//        return view('property.mortgage.show', compact('property', 'mortgage', 'mortgage_types' ) );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Property $property, Mortgage $mortgage)
    {

        $mortgage_types = PropertyMortgageRateType::all();

        $property_survey = $mortgage->getMedia('property_surveys')->first() ?? null;

        return view('property.mortgage.edit', compact( 'property', 'mortgage', 'mortgage_types', 'property_survey' ) );
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

    // If I want to be completely CRUDDY these files could have their own models but I'd rather not
    public function upload_property_survey ( Request $request, Property $property, Mortgage $mortgage ) {

        $validated = $request->validate([
            'property_survey' => 'required|mimes:pdf|max:20480'
        ]);

        $file_path = $request->file('property_survey')->getRealPath();

        $mortgage->addMedia( $file_path )->toMediaCollection('property_surveys');

        return response()->redirectToRoute('property.mortgage.edit', [ $property, $mortgage ]);

    }

}
