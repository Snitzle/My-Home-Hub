<?php

use App\Models\ReminderCategory;
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
        Schema::create('reminders', function (Blueprint $table) {

            $table->id();
            $table->foreignIdFor( User::class );
            
            $table->string('name');

            $table->text('notes')->nullable();
            $table->string('url')->nullable();

            $table->time('file_name')->nullable();
            $table->string('file_path')->nullable();
            $table->uuid('file_uuid')->nullable();

            $table->datetime('start_datetime')->default( now()->addDays(rand( 0, 30 ) ) );
            
            $table->tinyInteger('type');
            $table->tinyInteger('status');
            $table->foreignIdFor( ReminderCategory::class )->default(0);
            // Tags are implemented as a many-to-many relationship

            $table->tinyText('reminder_frequency'); // Store this in the raw CRON format

            $table->tinyInteger('priority')->default(0);

            $table->dateTime('last_reminded_at');

            $table->boolean('completed');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reminders');
    }
};
