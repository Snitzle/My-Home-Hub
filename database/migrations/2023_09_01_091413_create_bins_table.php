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
        Schema::create('bins', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor( Property::class );
            $table->string('name');
            $table->smallInteger('collection_day');
            $table->tinyText('colour')->nullable();
            $table->tinyInteger('collection_frequency');
            $table->date('last_collected_at')->nullable();
            $table->tinyInteger('reminder_frequency')->default(0);
            $table->tinyInteger('remind_days_before_collection')->default(1); // How many days before collection do they want to be reminded
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bins');
    }
};
