<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'purchase_date' => 'datetime',
        'move_in_date' => 'datetime',
    ];

    public function user() {
        return $this->belongsTo( User::class, 'id' );
    }

    public function address () {
        return $this->hasOne( Address::class );
    }

    public function property_type () {
        return $this->belongsTo( PropertyType::class );
    }

    public function boiler () {
        return $this->hasOne( Boiler::class );
    }

    public function mortgage() {
        return $this->hasOne( Mortgage::class );
    }

    public function evaluations () {
        return $this->hasMany( Evaluation::class );
    }

    public function jobs () {
        return $this->hasMany( Job::class );
    }

    public function bills () {
        return $this->hasMany( PropertyBill::class );
    }

}
