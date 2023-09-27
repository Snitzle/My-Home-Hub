<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('more_frequent_reminders')->default(false);

            // Conditional reminder options

            // Typically work hours are 9 - 5. Not everyone works those hours though. would you like to be reminded in the day as well?
            // Turning this off will help us save money
            $table->boolean('remind_during_work_hours')->default( false );
            $table->boolean('bin_day_reminders')->default( true );
            $table->boolean('boiler_service_reminders')->default( true );

            $table->boolean('activated')->default( false );

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
