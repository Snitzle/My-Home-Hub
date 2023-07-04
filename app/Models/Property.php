<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function address () {
        return $this->hasOne( Address::class );
    }

    public function property_type () {
        return $this->hasOne( PropertyType::class );
    }

    public function boiler () {
        return $this->hasOne( Boiler::class );
    }

    public function evaluations () {
        return $this->hasMany( Evaluation::class );
    }

}
