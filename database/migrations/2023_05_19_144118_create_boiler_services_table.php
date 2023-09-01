<?php

use App\Models\Boiler;
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
        Schema::create('boiler_services', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor( Boiler::class );
            $table->date('service_date');
            $table->foreignIdFor(\App\Models\Worker::class )->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boiler_services');
    }
};
