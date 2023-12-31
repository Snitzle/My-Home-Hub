<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boiler extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'install_date' => 'date'
    ];

    public function services () {
        return $this->hasMany( BoilerCheck::class );
    }

}
