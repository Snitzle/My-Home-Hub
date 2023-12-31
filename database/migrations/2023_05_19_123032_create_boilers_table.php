<?php

use App\Models\Property;
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
        Schema::create('boilers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor( Property::class );
            $table->string('make');
            $table->smallInteger('type')->default(0); // 0 Regular, 1 Combi
            $table->string('model')->nullable();
            $table->date('install_date')->nullable();
            $table->boolean('active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boilers');
    }
};
