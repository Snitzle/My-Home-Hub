<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    use HasFactory;

    protected $guarded = ['id'];

    public function property () {
        return $this->belongsTo( Property::class );
    }

    public function country () {
        return $this->belongsTo( Country::class );
    }

}
