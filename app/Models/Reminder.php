<?php

namespace App\Models;

use App\Notifications\SendReminder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'last_reminded_at' => 'datetime',
    ];

    // Create constants on the model for type
    public const TYPE = [
        'bin' => 0,
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function category () {
        return $this->belongsTo(ReminderCategory::class);
    }

    public function tags () {
        return $this->belongsToMany(Tag::class);
    }



    public function isDue () {

        $now = now();

        if ( $this->start_datetime > $now ) {
            return false;
        }

        if ( $this->last_reminded_at === null ) {
            return true;
        }

        // Every 15 minutes
        if ( $this->reminder_frequency === config('cron')['every_fifteen_minutes'] ) {
            return $now->diffInMinutes( $this->last_reminded_at ) >= 15;
        }

        // Every 30 minutes
        if ( $this->reminder_frequency === config('cron')['every_thirty_minutes'] ) {
            return $now->diffInMinutes( $this->last_reminded_at ) >= 30;
        }

        // Every 45 minutes
        if ( $this->reminder_frequency === config('cron')['every_fourty_five_minutes'] ) {
            return $now->diffInMinutes( $this->last_reminded_at ) >= 45;
        }
        

        if ( $this->reminder_frequency === config('cron')['daily'] ) {
            return $now->diffInDays( $this->last_reminded_at ) >= 1;
        }

        if ( $this->reminder_frequency === config('cron')['weekly'] ) {
            return $now->diffInWeeks( $this->last_reminded_at ) >= 1;
        }

        // THIS would be good to implement in the future

        // if ( $this->reminder_frequency === config('cron')['fortnightly'] ) {
        //     return $now->diffInWeeks( $this->last_reminded_at ) >= 2;
        // }

        if ( $this->reminder_frequency === config('cron')['monthly'] ) {
            return $now->diffInMonths( $this->last_reminded_at ) >= 1;
        }

        if ( $this->reminder_frequency === config('cron')['yearly'] ) {
            return $now->diffInYears( $this->last_reminded_at ) >= 1;
        }

        return false;

    }

    public function sendNotification () {


        // We need to pass in the reminder details somehow
        $this->user->notify( new SendReminder( $this ) );

        $this->update([
            'last_reminded_at' => now(),
        ]);

    }

}
