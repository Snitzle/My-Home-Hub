<?php

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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('make');
            $table->string('model');
            $table->string('registration_number');
            $table->string('fuel_type')->nullable();
            $table->integer('price')->nullable();
            $table->date('purchase_date')->nullable();
            $table->date('sale_date')->nullable();
            $table->date('mot_date')->nullable();
            $table->boolean('archived')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
