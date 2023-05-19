<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function address () {
        $this->hasOne( Address::class );
    }

    public function boiler () {
        $this->hasOne( Boiler::class );
    }

    public function evaluations () {
        $this->hasMany( Evaluation::class );
    }

}
