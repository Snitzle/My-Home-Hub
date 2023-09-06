<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyBill;
use Illuminate\Http\Request;

class PropertyBillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request, Property $property )
    {

        $total_bill_cost = 0;

        foreach ( $property->bills as $bill ) {

            $total_bill_cost += $bill->price;

        }

        return view('property.bills.index', compact( 'property', 'total_bill_cost' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( Request $request, Property $property )
    {
        return view('property.bills.create', compact('property'));
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
    public function show( Request $request, Property $property, PropertyBill $bill )
    {
        return view('property.bills.show', compact('property', 'bill') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PropertyBill $propertyBill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PropertyBill $propertyBill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request, Property $property, PropertyBill $bill )
    {
        
        // Add in guard for whether you own the bill
        if ( auth()->user()->id !== $property->user_id ) {
            return back()->withError('Can\'t delete bill for property you don\'t own');
        }

        $deleted = $bill->delete();

        return response()->redirectToRoute('property.bill.index', [ $property ])->withSuccess('Bill Deleted!');

    }
}
