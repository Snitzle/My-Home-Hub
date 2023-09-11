<?php

use App\Models\Country;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('alias');
            $table->string('company')->nullable();
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('address_3')->nullable();
            $table->string('town');
            $table->string('county')->nullable();
            $table->string('postcode');
            $table->foreignIdFor( Country::class ); // ISO 3166-1 Alpha 2 codes
            $table->boolean('primary')->default(false);
            $table->foreignIdFor( Property::class );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
