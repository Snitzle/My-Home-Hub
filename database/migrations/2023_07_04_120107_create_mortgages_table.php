<?php

use App\Models\Property;
use App\Models\PropertyMortgageRateType;
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
        Schema::create('mortgages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Property::class);
            $table->integer('monthly_payment');
            $table->float('interest_rate');
            $table->foreignIdFor( PropertyMortgageRateType::class );
            $table->integer('term_length');
            $table->date('start_date');
            $table->boolean('archived');
            // Using the spatie model there are also uploads for files like Surveys
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mortgages');
    }
};
