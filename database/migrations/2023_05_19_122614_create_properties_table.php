<?php

use App\Models\Address;
use App\Models\PropertyType;
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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class );
            $table->foreignIdFor( PropertyType::class );
            $table->string('name');
            $table->date('purchase_date')->nullable();
            $table->date('move_in_date')->nullable();
            $table->integer('price'); // In pennies
            $table->year('year_built')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
