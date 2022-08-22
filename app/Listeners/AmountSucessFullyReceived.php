<?php

namespace App\Listeners;

use App\Events\AmountTransferredEvent;
use App\Notifications\AmountSucessFullyReceived as SucessFullyReceivedNotification;

class AmountSucessFullyReceived
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
     * @param  \App\Events\AmountTransferredEvent  $event
     * @return void
     */
    public function handle(AmountTransferredEvent $event)
    {
        $event->target->notify(new SucessFullyReceivedNotification($event->target));
    }
}
