<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Models\Job;
use App\Models\Property;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Property $property )
    {

        $jobs = Job::where('property_id', $property->id )->get();

        return view('jobs.index', compact('jobs', 'property') );

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
    public function show(Property $property , Job $job)
    {
        return view('jobs.show', compact( 'property', 'job' ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Property $property, Job $job)
    {
        return view('jobs.edit', compact('property', 'job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( StoreJobRequest $request, Property $property, Job $job)
    {

        $job->update( $request->validated() );

        return response()->redirectToRoute('property.job.show', [$property->id, $job->id]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
