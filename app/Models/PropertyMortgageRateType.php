<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyMortgageRateType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mortgages() {
        return $this->belongsToMany( Mortgage::class );
    }

}
