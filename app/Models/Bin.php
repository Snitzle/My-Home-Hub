<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'last_collected_at' => 'datetime'
    ];

    public function property () {
        return $this->belongsTo( Property::class );
    }

    public function next_collection_day () {

        $next_collection_date = '';

        switch ( $this->collection_frequency ) {

            case 0:

                // Twice a week logic needs implementing

                break;

            case 1:

                // Once a week
                return $this->last_collected_at->addWeeks(1);

                break;

            case 2:

                // Once every two weeks
                return $this->last_collected_at->addWeeks(2);

                break;

            case 3:

                // Once every month

                return $this->last_collected_at->addMonth(1);

                break;

        }

    }

    public function next_reminder () {

        // Do the maths for the next reminder time

    }

}
