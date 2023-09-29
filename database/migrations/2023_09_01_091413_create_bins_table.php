<?php

use App\Models\Property;
use App\Models\Reminder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            // Each bin can have a reminder. It's stored on the bin to keep from polluting the reminders table.
            $table->foreignIdFor( Reminder::class )->nullable();

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
