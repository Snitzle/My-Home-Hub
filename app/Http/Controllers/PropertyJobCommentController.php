<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Property;
use App\Models\PropertyJobComment;
use Illuminate\Http\Request;

class PropertyJobCommentController extends Controller
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
    public function create( Property $property, Job $job )
    {
        return view('jobs.comment.create', compact('property', 'job'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Property $property, Job $job )
    {

        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $validated = array_merge( $validated, ['job_id' => $job->id]);

        $comment = PropertyJobComment::create($validated);

        return response()->redirectToRoute('property.job.show', [ $property->id, $job->id ] );

    }

    /**
     * Display the specified resource.
     */
    public function show(PropertyJobComment $propertyJobComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Property $property, Job $job, PropertyJobComment $comment )
    {
        return view('jobs.comment.edit', compact('property', 'job', 'comment') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property, Job $job, PropertyJobComment $comment)
    {
        // Make this into a form request
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string'
        ]);

        $comment->update( $validated );

        return response()->redirectToRoute('property.job.show', [$property->id, $job->id ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Property $property, Job $job, PropertyJobComment $comment )
    {

        // Make sure users own this comment before they can delete it
        if ( auth()->user()->id !== $property->user_id ) {
            return back()->withError('Unauthorized Deletion', 'This Comment does not belong to you');
        }

        $comment->delete();

        return response()
                ->redirectToRoute('property.job.show', [ $property->id, $job->id ])
                ->with('Success', 'Comment deleted');
    }
}
