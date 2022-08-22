<?php

namespace App\Listeners;

use App\Events\TransferenceFailedEvent;
use App\Notifications\TransferFailure;

class TransferFailureListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\TransferenceFailedEvent  $event
     * @return void
     */
    public function handle(TransferenceFailedEvent $event)
    {
        $event->customer->notify(new TransferFailure($event->customer));
    }
}
