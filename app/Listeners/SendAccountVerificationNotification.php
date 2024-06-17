<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Notifications\AccountVerificationNotification;

class SendAccountVerificationNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        if ($event->user->type === 'Vendor') {
            $event->user->notify(new AccountVerificationNotification($event->user));
        }
    }
}
